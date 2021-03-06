<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use DB;
use App\Models\Item;
use App\Models\AttributeTemplate;


use App\Models\Attribute;

use Laravel\Lumen\Routing\Controller as BaseController;

class ItemsController extends BaseController
{
    public function index(Request $request){
        $this->validate($request,[
                'category_template_id' => 'required',
            ]);
        return Item::where("category_template_id",$request->category_template_id)->with('attributes')
        ->get()->map(function ($item) {


            return ([
            'nome'=> $item->name,
            'Descrição'=> $item->description,
            'attributies' =>  $item->attributes             

            ]);
        })   ;
        
    }

    public function store(Request $request){
        $this->validate($request,[
                'name' => 'required',
                'description' => 'required',
                'category_template_id'=>'required',
                'attributes'=>'required'
                ]);   
        $attributes_ids = AttributeTemplate::where("category_template_id",$request->category_template_id)->get()->pluck("id")->toarray();
       
        $confirmedAttributes = array_filter($request["attributes"], function ($var) use ($attributes_ids) {
            return in_array($var['id_att'],$attributes_ids);
        });
        if(count($confirmedAttributes)>0){
            $item = Item::create(["name" => $request->name,"description" => $request->description,"category_template_id" =>$request->category_template_id]);
            $item->save();
            foreach ($confirmedAttributes as $attribute){
                    $att = new Attribute;
                    $att->data =  $attribute["data"];
                    $att->description =   AttributeTemplate::find($attribute["id_att"])->name;
                    $att->item()->associate($item);
                    $att->save();

            }
            return response()->json([
                "status" =>200,
                "message" =>"items created"

            ]);
        }
        return response()->json([
                "status" =>200,
                "message" =>"no items created"
            ]);

        
        // DB::commit();

    }

     
    public function update(Request $request){
         
        $this->validate($request, [
            'id' => 'required',
        ]);
        $input = $request->all();
        $item = Item::find($request->id);
        $item->update($input);
 
        return response()->json([
            "status" =>200,
            'message' => 'Item Atualizado'
        ]);
    }


    public function detroy(Request $request){
        $this->validate($request, [
            'id' => 'required',
        ]);
        Item::destroy($request->id);
        
        return response()->json([
            "status" =>200,
            'message' => 'Item Deletado'
        ]);
    }
}

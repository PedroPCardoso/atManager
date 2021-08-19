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
       
        return Item::where("category_template_id",$request->category_template_id)->get();
        
    }

    public function store(Request $request){
        // $request->validate([
        //         'description' => 'required',
        //         'name' => 'required',
        //         'category_template_id'=>'required',
        //         ]);    
        $attributes_ids = AttributeTemplate::where("category_template_id",$request->category_template_id)->get()->pluck("id")->toarray();
       
        $confirmedAttributes = array_filter($request["attributes"], function ($var) use ($attributes_ids) {
            return in_array($var['id_att'],$attributes_ids);
        });
        if(count($confirmedAttributes)>0){

            $item = Item::create(["description" => $request->description,"name" => $request->name,"category_template_id" =>$request->category_template_id]);
            $item->save();
            foreach ($confirmedAttributes as $attribute){
                    $att = new Attribute;
                    $att->data =  $attribute["data"];
                    $att->description =  $attribute["description"] ? $attribute["description"] : null ;
                    $att->item()->associate($item);
                    $att->save();

            }
            return repsonse()->json([
                "status" =>200
            ]);
        }
        return repsonse()->json([
                "status" =>200
            ]);

        
        // DB::commit();

    }

     
    public function update(){
        
    }


    public function detroy(){
        
    }
}

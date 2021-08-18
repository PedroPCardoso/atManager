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
       
        return Item::where("category_template_id",$request->id)->get();
        
    }

    public function store(Request $request){
        // DB::beginTransaction();
        // $attributes = AtributeTemplate::where("category_template_id",$request->category_template_id)->get();
        // dd($request->category_template_id);
        $item = Item::create(["description" => $request->description,"name" => $request->name,"category_template_id" =>$request->category_template_id]);
        $item->save();
        foreach ($request["attributes"] as $attribute){
                $att = new Attribute;
                $att->data =  $attribute["data"];
                $att->description =  $attribute["description"] ? $attribute["description"] : null ;
                $att->item()->associate($item);
                $att->save();

        }
        
        
        // DB::commit();

    }

     
    public function update(){
        
    }


    public function detroy(){
        
    }
}

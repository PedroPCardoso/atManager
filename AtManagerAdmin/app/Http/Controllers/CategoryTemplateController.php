<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use DB;
use App\Models\CategoryTemplate;
use App\Models\AttributeTemplate;

use Laravel\Lumen\Routing\Controller as BaseController;

class CategoryTemplateController extends BaseController
{
    public function index(){
      
        return CategoryTemplate::with('attributesTemplate')->get();
    }

    public function store(Request $request){
        $this->validate($request,[
        'name' => 'required',
        'description' => 'required',
        'attributes'=>'required'
        ]);   
        // DB::beginTransaction();
        // dd($request->all());
        $categoryTemplate = CategoryTemplate::create(["description" => $request->description,"name" => $request->name]);
        $categoryTemplate->save();
        foreach($request["attributes"] as $attribute){
            $att = new AttributeTemplate;
            $att->name =$attribute["name"];
            $att->required =true;            
            $att->description = $attribute["description"];
            // $att = AtributeTemplate::create(["description" => $attribute->description,"name" => $attribute->name,"required" => $attribute->required]);
            $att->categoryTemplate()->associate($categoryTemplate);
            $att->save();
        }
        return response()->json([
                "status" =>200,
                "message" =>"Category created"

            ]);
        // DB::commit();

    }

     
    public function update(){
        
    }


    public function detroy(){
        
    }
}

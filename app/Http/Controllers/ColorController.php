<?php

namespace App\Http\Controllers;
use App\Models\Color;
use DB;
use Illuminate\Http\Request;
use App\Http\Resources\ColorResource;
use Validator;

class ColorController extends BaseController
{
   public function store(Request $request){
        // $colorRequest = $request->$color;
        // $color = DB::table("colors")->where("color",$colorRequest)->get();
        // print_r($colorRequest);

        $input = $request->all();
        $validator = Validator::make( $input , [

            // "id"=>"required",
            "color" =>"required"
        ],[
            "color.required"=>"Adj meg egy színt!"
        ]);

        if( $validator->fails() ){
            return $this->sendError( $validator->errors() );

        }
        $color = Color::create( $input);
        return $this->sendResponse(  new ColorResource( $color ), "Létrehozva");

        }


    public function show($id){
        $color = Color::find($id);

        // if(is_null($color){

        // });


    }
    public function update(Request $request, $id){

        $input = $request->all();
        $validator = Validator::make( $input , [

            // "id"=>"required",
            "color" =>"required"
        ],[
            "color.required"=>"Adj meg egy színt!"
        ]);
        if ($validator->fails() ){
           return $this->sendError( $validator->errors() );
        }
        $color = Color::find($id);
        $color->update( $request->all() );

        return $this->sendResponse(  new ColorResource( $color ), "Frissítve");
    }

}

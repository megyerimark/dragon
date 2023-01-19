<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Dragon;
use App\Http\Controllers\BaseController as BaseController;
use DB;
use App\Http\Resources\DragonResource;

use Validator;

class DragonController extends BaseController
{
    public function store(Request $request){

        $input = $request->all();

        $input["color_id"] = Color::where('color', $input['color_id'])->first()->id;

        $validator = Validator::make($input,  [
            "name" =>"required",
            "age" =>"required",
            "color_id" =>"required",
           

        ]);
       
         if($validator->fails() ){

            return $this->sendError($validator->errors());
    }
    $dragon= Dragon::create($input);
   return $this->sendResponse( new DragonResource($dragon), "Siker báttya");
   print_r("siker báttya");
    
}

public function index(){
    $dragons = Dragon::all();
    //echo "<pre>";
    print($dragons);
   
    //return $this->sendResponse(DragonResource::collection($dragons ), "ok");

}
public function update(Request $request, $id){

    $input = $request->all();
    $validator = Validator::make( $input , [

        "name" =>"required",
        "age" =>"required",
         "color_id" =>"required",
    
    ]);

    if ($validator->fails() ){
       return $this->sendError( $validator->errors() );
    }
    $dragon = Dragon::find($id);
    $dragon->update( $request->all() );
    return $this->sendResponse(  new DragonResource( $dragon ), "Frissítve");
}
}

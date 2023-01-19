<?php

namespace App\Http\Controllers;
use App\Models\Color;
use DB;
use Illuminate\Http\Request;

class ColorController extends Controller
{
   public function store(Request $request){
        $colorRequest = $request->$color;
        $color = DB::table("colors")->where("color",$colorRequest)->get();
        print_r($colorRequest);
        }

    public function show($id){
        $color = Color::find($id);

        // if(is_null($color){

        // });


    }
    public function store(Request $request){
        $color
    }

}

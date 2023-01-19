<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{

    public function sendResponse( $result, $message){
        $response = [
            "success" =>true,
            "data" => $result,
            "message" =>$message
        ];

        return response()->json($response, 200);
    }


    // public function sendError( $error, $errorMessage = [], $code=400){
    //     $response = [
    //         "success" =>true,
    //         "message" => $result,

    //     ];

    //     return response()->josn($response, 200);
    // }


}

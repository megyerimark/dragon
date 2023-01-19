<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
use Illuminate\Http\Request;

class AuthController extends BaseController
{

    public function SignIn(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password'=> $request->password])){

            $auth = Auth::user();
            $success['token'] =  $auth->createToken('MyAuthApp')->plainTextToken;
            $success['name'] = $auth->name;

            return $this->sendResponse($success, 'Sikeres bejelentkezés');
            // print_r("Sikeres bejelentkezés");
        }
        else{
            // return $this->sendError("Unauthorizd.".['error' =>'Hibás adatok']);
        }
    }

    public function SignUp(Request $request){

        $validator = Validator::make($request->all(),
        [

            "name"=>"required",
            "email"=> "required",
            "password"=> "required",
            "confirm_password"=> "required|same:password"
        ]);

        if( $validator->fails()){
            // return sendError("Error Validation", $validator->errors());
        }

        $input = $request->all();
        $input["password"] = bcrypt($input ["password"]);
        $user = User::create($input);
        $success["name"] = $user->name;


    }

    public function Logout(Request $request){

        auth("sanctum")->user()->currentAccessToken()->delete();

        return response()->json("Sikeres kijelentkezés");
    }
}

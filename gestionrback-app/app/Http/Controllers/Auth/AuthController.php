<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\http\Requests\StoreRequestRegister;

class AuthController extends Controller
{
   
   public function Login(Request $request){
       
    if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        $user=Auth::user();
        $token=$user->createToken('api_token')->plainTextToken;
        $respnose=[
            'token'=>$token,
            'user'=>$user,
        ];
        return response()->json(['data'=>$respnose],200);
    }else{
        return response()->json(['data'=>"User Not Found"],401);
    }
   }

   public function register(StoreRequestRegister $request){
    
     $user=User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcrypt($request->password)
     ]
    );

    /*$user=new User();
    $user->name=$request->name;
    $user->email=$request->email;
    $user->password=bcrypt($request->password);*/

    return response()->json(['data'=>$user],200);
   }
  
}

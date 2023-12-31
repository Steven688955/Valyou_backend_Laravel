<?php

namespace App\Http\Controllers\API;

use App\User; 
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; 
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{

    public function __construct(){

    }
    public function login(Request $request) { 
        $credentials = [
            'email' => $request->email, 
            'password' => $request->password
        ];
     
        if( auth()->attempt($credentials) ) { 
            $user = Auth::user(); 
            $success['token'] = $user->createToken('AppName')->accessToken; 
            return response()->json(['success' => $success], 200);
        } else { 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
        
    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'country' => ['required','string'],
            'avatar' => ['required', 'string'],
        ]);
     
        if ($validator->fails()) { 
          return response()->json([ 'error'=> $validator->errors() ]);
        }
        $data = $request->all(); 
        
        $data['password'] = Hash::make($data['password']);
        
        $user = User::create($data); 

        // $success['token'] =  $user->createToken('AppName')->accessToken;
        $credentials = [
            'email' => $request->email, 
            'password' => $request->password
        ];
        
        if( auth()->attempt($credentials) ) { 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('AppName')->accessToken; 
            return response()->json(['success' => $success], 200);
        } else { 
            return response()->json(['error'=>'Unauthorised'], 401); 
        }
    }
      
}


<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
        public function login()
        {
           return view('login');
        }

    public function auth(Request $request){

        $userId = $request->UserID;
        $password = $request->Password;
        $data = User::where('UserID', $userId)->first();
        if($data && Hash::check($password, $data->Password))
        {
            Auth::login($data);
    
            return redirect('/home');
        }
            return redirect('/login')->with('message'); 
    }

     public function logout(Request $request){
    //     // users::logout();
        Auth::logout();

       return redirect('/login');
    }

    public function authenticating(Request $request){
        $userId = $request->UserID;
        $password = $request->Password;
        $data = User::where('UserID', $userId)->first();
        if($data)
        {
            if($data && Hash::check($password, $data->Password))
            {
                $response['status'] = "Success";
                $response['message'] = "Login Successful";
                $response['data'] = $data;
    
                return response()->json($response, 200);
            }
            else{
                $response['status'] = "Error";
                $response['message'] = "Wrong UserID or Password.";
    
                return response()->json($response, 409);
            }
        }
    }
    public function userlogout()
    {
        $response['status'] = "Success";
        $response['message'] = "Logout Successful";
        
        return response()->json($response, 200);
    }
}


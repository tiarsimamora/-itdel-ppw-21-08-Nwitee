<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class SignUpController extends Controller
{
    public function showFormSignUp ()
    {
        return view('SignUp');
    }

   
    public function SignUp(Request $request)
    {
        $this->validate($request, [
            'UserID' => 'required',
            'Username' => 'required',
            'Password' => 'required|min:5|max:20',
            'Email' => 'required|email',
            'Date_Of_Birth' => 'required'
        ]);
        
        User::create([
            'UserID' => $request->UserID,
            'Username' => $request->Username,
            'Email' => $request->Email,
            'Password' => Hash::make($request->Password),
            'Date_Of_Birth' => $request->Date_Of_Birth,
            
        ]);

        return redirect('/login');
    }


    public function signupapi(Request $request)
    {

      
        
        $user = User::create([
            'UserID' => $request->UserID,
            'Username' => $request->Username,
            'Email' => $request->Email,
            'Password' => Hash::make($request->Password),
            'Date_Of_Birth' => $request->Date_Of_Birth,
        ]);
        
        $data = $user;

        return $this->sendResponse($data, 'Succes to SignUp');
    }
    protected function authenticated(Request $request, $user)
    {
        $user->generateTwoFactorCode();
        $user->notify(new TwoFactorCode());
    }
}
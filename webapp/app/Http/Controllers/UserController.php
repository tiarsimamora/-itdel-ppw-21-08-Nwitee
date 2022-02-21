<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;

class UserController extends Controller
{
    //
    public function profile(){
    	return view('/Profile', array('user' => Auth::user()) );
    }

    public function update_avatar(Request $request){

    	// Handle the user upload of avatar
    	if($request->hasFile('avatars')){
    		$avatar = $request->file('avatars');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/Img/avatars/' . $filename ) );

    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}

    	return view('/profile', array('user' => Auth::user()) );

    }

	public function edit()
    {
        return view('/editProfile');
    }

    public function update(Request $request)
    {
        $attr = $request->validate([
            'UserID' => ['string', 'min:3', 'max:200', 'required'],
            'Email' => ['email', 'string', 'min:3', 'max:200', 'required'],
            'Username' => ['required', 'alpha_num', 'unique:users,Username,' . auth()->id()],
        ]);

        auth()->user()->update($attr);
        
        return back()->with('success', 'Your profile has been updated');
        return redirect('/profile');
    }
    
}
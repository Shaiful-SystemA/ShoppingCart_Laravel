<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class UserController extends Controller
{
    //
    
    public function getSignup()
    {
        return view('User.signup');
    }
    
    public function postSignup(Request $request)
    {
        $this->validate( $request,[
                'email' => 'email|required|unique:users',
                'password' => 'required|min:4'
            ]);
            
            $user = new User([
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password'))
                ]);
            $user->save();
            
            Auth::login($user);
            
            return redirect()->route('User.profile');
    }
    
    
    
    
    public function getSignin()
    {
        return view('User.signin');
    }
    
    public function postSignin(Request $request)
    {
   
        $this->validate( $request,[
                'email' => 'email|required',
                'password' => 'required|min:4'
            ]);
            
        if(Auth::attempt(['email' => $request->input('email'), 'password' =>
            $request->input('password') ])){
                return redirect()->route('User.profile');
            }
            return redirect()-> back();
    }
    
    
    public function getProfile(){
        return view('User.profile');
        
    }
    
    public function getLogout(){
        Auth::logout();
        return redirect()->back();
    }
    
}

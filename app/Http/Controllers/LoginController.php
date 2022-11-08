<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class LoginController extends Controller
{
    
    function login(Request $request) {
        //return back()->withInput()->with('message', "You are not registered");
        
        $email = $request->email;
        
        $exists = Usuario::where('correo', $email)->exists();
        
        $credentials =  $this->validate(request(), [
            'email' => 'required'
        ]);
       
        if($exists){
            $request->session()->put('user', true);
            session()->put('email', $email);
            return redirect('/')->with('message', 'You are logged in.');
        }
        else {
            return back()->withInput()->with('message', "You are not registered");
            //return redirect('/')->with('message', "You are not registered");
            //withInput() hace que podamos enseñar el old que habia en el imput
        }
        
    }
    
    function logout(Request $request) {
        $request->session()->forget('user');
        $request->session()->flash('message', 'You are logged out.');
        return redirect('/');
    }
    

}
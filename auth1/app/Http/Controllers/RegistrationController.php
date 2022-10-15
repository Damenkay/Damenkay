<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    //
    public function index(){


        
        return view('Auth.registration');
    } 

    public function store(Request $request){

        $this->validate($request, [
            'username'=>'required|max:15',
            'email'=>'required|email:unique',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required'
        ]);
        Registration::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)


        ]);
    return redirect()->route('login');
    }

    public function login(){


        
        return view('Auth.login');
    } 
}

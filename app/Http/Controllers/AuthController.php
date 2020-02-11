<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Auth; 
use Validator;

class AuthController extends Controller
{
/** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            return view('home'); 
        } 
        else{ 
            return view('auth/login'); 
        } 
    }
/** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function logout(){ 
            return view('login'); 
        } 
}

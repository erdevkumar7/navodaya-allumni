<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //registerNavodayanForm
    public function registerNavodayanForm(){
        return view('auth.register-allumni');
    }
}

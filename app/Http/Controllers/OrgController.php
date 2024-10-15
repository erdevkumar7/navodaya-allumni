<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class OrgController extends Controller
{
    public function dashboard()
    {
        return view('org.dashboard');
    }

}

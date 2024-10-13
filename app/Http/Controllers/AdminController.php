<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function allumniList()
    {
        $allAllumni = User::all();
        return view('admin.allumni-list', compact('allAllumni'));
    }
}

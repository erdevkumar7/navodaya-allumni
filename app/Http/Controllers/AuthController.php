<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //registerNavodayanForm
    public function registerNavodayanForm()
    {
        return view('auth.register-allumni');
    }

    public function registerNavodayanFormSubmit(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'email' => 'required|string|email|max:100|unique:users',
            'phone_number' => 'required|numeric',
            'city' => 'required|string',
            'gender' => 'required',
            'state' => 'required|string',
            'district' => 'required|string',
            // 'jnv_name' => 'sometimes|string|nullable',
            'passout_batch' => 'required|string',
            'profession' => 'required|string',
            'profession_specification' => 'nullable|string|max:100',
            'password' => 'required|string|min:6',
        ]);
    
        // Hashing the password and adding it to the validated data
        $validatedData['original_password'] = $validatedData['password'];
        $validatedData['password'] = Hash::make($validatedData['password']);
    
        // Creating the user
        try {
            $allumuni = User::create($validatedData);
    
            return redirect()->route('index')->with('success', 'Alumni added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create alumni: ' . $e->getMessage());
        }
    }
    
}

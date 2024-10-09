<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AuthController extends Controller
{
    //registerNavodayanForm
    public function registerNavodayanForm()
    {
        return view('auth.register-allumni');
    }



    // public function registerNavodayanFormSubmit(Request $request)
    // {
    //     // Validation
    //     $validatedData = $request->validate([
    //         'first_name' => 'required|string|max:30',
    //         'last_name' => 'required|string|max:30',
    //         'email' => 'required|string|email|max:100|unique:users',
    //         'phone_number' => 'required|numeric',
    //         'city' => 'required|string',
    //         'gender' => 'required',
    //         'state' => 'required|string',
    //         'district' => 'required|string',
    //         'passout_batch' => 'required|string',
    //         'profession' => 'required|string',
    //         'profession_specification' => 'nullable|string|max:100',
    //         'password' => 'required|string|min:6',
    //     ]);

    //     // Hashing the password and adding it to the validated data
    //     $validatedData['original_password'] = $validatedData['password'];
    //     $validatedData['password'] = Hash::make($validatedData['password']);

    //     // Creating the user
    //     try {
    //         $allumuni = User::create($validatedData);

    //         $qrCodeImage = time() . '_' . $allumuni->id . '_qrcode.jpg';
    //         $qrCodeFileName = 'qrcodes/' . $qrCodeImage;
    //         QrCode::size(250)->generate('User ID: ' . $allumuni->id, public_path($qrCodeFileName));

    //         $allumuni->qr_code_image = $qrCodeImage;
    //         $allumuni->save();

    //         return redirect()->route('index')->with('success', 'Alumni added successfully, QR code generated!');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Failed to create alumni: ' . $e->getMessage());
    //     }
    // }

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

        // Prepare user data for QR code
        $qrData = [
            'first_name' => $allumuni->first_name,
            'last_name' => $allumuni->last_name,
            'email' => $allumuni->email,
            'phone_number' => $allumuni->phone_number,
            'city' => $allumuni->city,
            'state' => $allumuni->state,
            'district' => $allumuni->district,
            'passout_batch' => $allumuni->passout_batch,
            'profession' => $allumuni->profession,
        ];

        // Convert user data to JSON format for the QR code
        $qrCodeData = json_encode($qrData);

        // Generate the QR code
        $qrCodeImage = time() . '_' . $allumuni->id . '_qrcode.jpg';
        $qrCodeFileName = 'qrcodes/' . $qrCodeImage;
        QrCode::size(250)->generate($qrCodeData, public_path($qrCodeFileName));

        // Save the QR code image path in the user table
        $allumuni->qr_code_image = $qrCodeImage;
        $allumuni->save();

        return redirect()->route('index')->with('success', 'Alumni added successfully, QR code generated!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to create alumni: ' . $e->getMessage());
    }
}


    public function generateQRcode()
    {
        return view('auth.allumni-qrcode');
    }
}

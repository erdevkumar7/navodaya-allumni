<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Org;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;

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

    public function registerAdminForm()
    {
        return view('admin.layout-data.register');
    }

    public function registerAdminFormSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:70|unique:admins',
            'password' => 'required|string|min:6',
        ]);

        $validatedData['original_password'] = $validatedData['password'];
        $validatedData['password'] = Hash::make($validatedData['password']);

        $admim = Admin::create($validatedData);


        return redirect()->route('admin.adminLoginForm')->with('success', 'Admin registered successfully!');
    }

    public function adminLoginForm()
    {
        return view('admin.layout-data.login');
    }

    public function adminLoginFormSubmit(Request $request)
    {
        // Validate the request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Attempt to log the admin in
        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed
            return redirect()->route('admin.dashboard')->with('success', 'Logged in successfully!');
        }

        // Authentication failed
        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function orgRegForm()
    {
        return view('org.register');
    }

    public function orgRegFormSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'required|string|email|max:70|unique:orgs',
            'password' => 'required|string|min:6',
        ]);

        $validatedData['original_password'] = $validatedData['password'];
        $validatedData['password'] = Hash::make($validatedData['password']);

        $org = Org::create($validatedData);
        return redirect()->route('org.loginForm')->with('success', 'Organizer registered successfully!');
    }

    public function orgLoginForm()
    {
        return view('org.login');
    }

    public function orgLoginFormSubnit(Request $request)
    {
        // Validate input
        $credentials = $request->validate([
            'email' => 'required|string|email|max:70',
            'password' => 'required|string|min:6',
        ]);

        // Attempt to log in
        if (Auth::guard('org')->attempt($credentials)) {
            return redirect()->route('org.dashboard')->with('success', 'Logged in successfully!');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    // Handle admin logout
    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.adminLoginForm')->with('success', 'Logged out successfully!');
    }

    public function orgLogout()
    {
        Auth::guard('org')->logout();
        return redirect()->route('org.loginForm')->with('success', 'Logged out successfully!');
    }
}

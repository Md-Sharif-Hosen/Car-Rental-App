<?php

namespace App\Http\Controllers\Admin;

use App\Helper\JWTToken;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    public function UserLogin()
    {
        return view('pages.auth.login-page');
    }

    public function UserRegistration()
    {
        return view('pages.auth.registration-page');
    }
    public function SendOTP()
    {
        return view('pages.auth.send-otp-page');
    }
    public function VerifyOTP()
    {
        return view('pages.auth.verify-otp-page');
    }
    public function ResetPassword()
    {
        return view('pages.auth.reset-password-page');
    }

    public function Dashboard()
    {
        return view('pages.admin.dashboard-page');
    }

    public function Customers()
    {
        return view('pages.admin.customers-page');
    }

    public function CustomerRegistration(Request $request)
    {
        try {


            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'password' => $request->password,
                'role' => "customer", // Assuming role_id 2 is for customer
            ]);
            return response()->json([
                'status' =>"success",
                'message' => 'Customer registered successfully',

            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => "failed",
                'message' => 'User Registration Faild"',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function CustomerLogin(Request $request)
    {
        // Find the user by email

        //  dd($request->all());
        $user = User::where('email', '=', $request->input('email'))
            ->where('password', '=', $request->input('password'))
            ->first();
        if ($user !== null) {

            // Unauthorized
            $token = JWTToken::CreateToken($user->id, $user->email, $user->role);
            // Return token in response and cookie
            return response()->json([
                'status' => 'success',
                'message' => 'User Login Successful',
                'role' => $user->role
            ])->cookie('token', $token, time() + 60 * 24 * 30, "/", null, false, true, false, 'Lax');
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized'
            ],);
        }
    }

    function CustomerLogout(Request $request){
        $request->session()->flush();
        return redirect('/')->cookie('token','',-1);
    }
}

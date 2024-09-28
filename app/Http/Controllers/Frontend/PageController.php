<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\JWTToken;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function Index( Request $request)
    {
        $token = $request->cookie('token');

        if ($token) {
            $result = JWTToken::VerifyToken($token);

            if (is_object($result) && isset($result->userEmail, $result->userID, $result->userRole)) {
                // সেশনে ব্যবহারকারীর তথ্য সেট করা হচ্ছে
                session(['userEmail' => $result->userEmail, 'userRole' => $result->userRole]);
            } else {
                // টোকেন অবৈধ হলে সেশন মুছে ফেলুন
                session()->forget(['userEmail', 'userRole']);
            }
        } else {
            // যদি টোকেন না থাকে তবে সেশন মুছে ফেলুন
            session()->forget(['userEmail', 'userRole']);
        }
        return view('pages.frontend.index');
    }
}

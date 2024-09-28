<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function Rental()
    {
        return view('pages.admin.rentals-page');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // Display all cars (Read)
    public function index()
    {
        $cars = Car::all();
        return view('pages.admin.car.index', compact('cars'));
    }

    // Show form to create a new car (Create)
    public function create()
    {
        return view('pages.admin.car.create');
    }

    // Store new car to database (Create)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'brand' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'year' => 'required|integer',
            'car_type' => 'required|string|max:100',
            'daily_rent_price' => 'required|numeric',
            'availability' => 'required|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'  // ফাইল আপলোডের ভ্যালিডেশন
        ]);

        // ইমেজ ফাইলটি সংরক্ষণ
        if ($request->hasFile('image')) {
            $img=$request->file('image');
            $t=time();
            $fileName=$img->getClientOriginalName();
            $imgName="{$fileName}-{$t}";
            $img_url="uploads/{$imgName}";

            $img->move(public_path("assets/admin/uploads/car"),$imgName);
            // $imagePath = $request->file('image')->store('images/cars', 'public'); // পাবলিক স্টোরেজে সংরক্ষণ
            $validated['image'] = $img_url;
        }

        Car::create($validated);
        return redirect()->route('cars.index')->with('success', 'Car added successfully');
    }

    // Show car edit form (Edit)
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.edit', compact('car'));
    }

    // Update car in database (Update)
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'brand' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'year' => 'required|integer',
            'car_type' => 'required|string|max:100',
            'daily_rent_price' => 'required|numeric',
            'availability' => 'required|boolean',
            'image' => 'required|string|max:255'
        ]);

        $car = Car::findOrFail($id);
        $car->update($validated);
        return redirect()->route('cars.index')->with('success', 'Car updated successfully');
    }

    // Delete a car (Delete)
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Car deleted successfully');
    }
}



@extends('components.admin.layouts.side-layout')
@section('content')

<div class="container">
    <h1>Add New Car</h1>
    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Car Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" name="brand" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="model">Model</label>
                    <input type="text" name="model" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="number"  name="year"  min="1900" max="{{ date('Y') }}"  class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="car_type">Car Type</label>
                    <input type="text" name="car_type" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="daily_rent_price">Daily Rent Price</label>
                    <input type="number" step="0.01" name="daily_rent_price" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="availability">Availability</label>
                    <select name="availability" class="form-control">
                        <option value="1">Available</option>
                        <option value="0">Not Available</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="image">Image URL</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Add Car</button>
    </form>
</div>



@endsection

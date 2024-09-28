@extends('components.admin.layouts.side-layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="card px-5 py-5">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>Car List</h4>
                        </div>
                        <div class="align-items-center col">
                            <a href="{{ route('cars.create') }}" class="float-end btn m-0 bg-gradient-primary">Add New Car</a>
                            {{-- <button data-bs-toggle="modal" data-bs-target="#create-modal" --}}
                            {{-- class="float-end btn m-0 bg-gradient-primary">Create</button> --}}
                        </div>
                    </div>
                    <hr class="bg-secondary" />
                    <table class="table mt-4" id="tableData">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Year</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Availability</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tableList">
                            @foreach ($cars as $car)
                                <tr>
                                    <td>{{ $car->id }}</td>
                                    <td>{{ $car->name }}</td>
                                    <td>{{ $car->brand }}</td>
                                    <td>{{ $car->model }}</td>
                                    <td>{{ $car->year }}</td>
                                    <td>{{ $car->car_type }}</td>
                                    <td>{{ $car->daily_rent_price }}</td>
                                    <td>
                                        @if ($car->image)
                                            <img src="{{ asset('assets/admin/uploads/car/' . $car->image) }}"
                                                alt="{{ $car->name }}" width="100" height="auto">
                                        @else
                                            <p>No Image Available</p>
                                        @endif
                                    </td>
                                    <td>{{ $car->availability ? 'Available' : 'Not Available' }}</td>

                                    <td>
                                        <a href="{{ route('cars.edit', $car->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <script>
        new DataTable('#tableData', {
            order: [
                [0, 'asc']
            ],
            lengthMenu: [5, 10, 15, 20, 30]
        });
        // $(document).ready(function() {
        //     $('#tableData').DataTable({
        //         order: [[0, 'asc']],
        //         lengthMenu: [5, 10, 15, 20, 30],
        //     });
        // });
    </script>
@endsection

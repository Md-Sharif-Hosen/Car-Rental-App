@extends('components.admin.layouts.side-layout')
@section('content')
    @include('components.admin.customers.customer-create')
    @include('components.admin.customers.customer-list')
    @include('components.admin.customers.customer-delete')
    @include('components.admin.customers.customer-update')
@endsection

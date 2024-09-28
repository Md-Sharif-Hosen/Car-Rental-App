<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Car Rent App</title>
    <link rel="icon" type="image/x-icon" href="{{asset('/favicon.ico')}}" />
    <link href="{{asset('assets/admin/css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/admin/css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/admin/css/fontawesome.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/admin/css/toastify.min.css')}}" rel="stylesheet" />

    <script src="{{asset('assets/admin/js/toastify-js.js')}}"></script>
    <script src="{{asset('assets/admin/js/axios.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/config.js')}}"></script>
</head>

<body>

<div id="loader" class="LoadingOverlayd d-none">
<div class="Line-Progress">
    <div class="indeterminate"></div>
</div>
</div>

<div>
    @yield('content')
</div>


<script src="{{asset('assets/admin/js/bootstrap.bundle.js')}}"></script>

</body>
</html>

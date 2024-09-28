<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
            <div class="card w-90  p-4">
                <div class="card-body">
                    {{-- @if (session()->get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session()->get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif --}}
                    <h4>SIGN IN</h4>
                    <br />
                    <input id="email" placeholder="User Email" class="form-control" type="email" />
                    <br />
                    <input id="password" placeholder="User Password" class="form-control" type="password" />
                    <br />
                    <button onclick="SubmitLogin()" class="btn w-100 bg-gradient-primary">Next</button>
                    <hr />
                    <div class="float-end mt-3">
                        <span>
                            <a class="text-center ms-3 h6" href="{{ url('/userRegistration') }}">Sign Up </a>
                            <span class="ms-1">|</span>
                            {{-- <a class="text-center ms-3 h6" href="{{url('/sendOTP')}}">Forget Password</a> --}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function SubmitLogin() {
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        // Input Validation
        if (email.length === 0) {
            errorToast("Email is required");
            return; // Early exit
        }
        if (password.length === 0) {
            errorToast("Password is required");
            return; // Early exit
        }

        showLoader(); // Show loading indicator


        // Send login request
        let res = await axios.post("/customer_login", {
            email: email,
            password: password
        });
        // console.log(res)
        // console.log("User role:", res.data['role']);
        hideLoader(); // Hide loading indicator

        // Check response
        if (res.status === 200 && res.data['status'] === 'success') {
            successToast(res.data['message']);

            // Redirect based on user role
            if (res.data['role'] == 'admin') {
                window.location.href = "/dashboard"; // Admin redirect
            } else if (res.data['role'] == 'customer') {
                window.location.href = "/"; // Customer redirect
            } else {
                window.location.href = "/userLogin"; // Redirect for unknown role
            }
        } else {
            // Handle unexpected response
            errorToast(res.data['message']);
        }

    }
</script>

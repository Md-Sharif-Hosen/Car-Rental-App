<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10 center-screen">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                    <h4>Sign Up</h4>
                    <hr />
                    <div class="container-fluid m-0 p-0">
                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2">
                                <label>Email Address</label>
                                <input id="email" placeholder="User Email" class="form-control" type="email" />
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Name</label>
                                <input id="name" placeholder="Name" class="form-control" type="text" />
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Mobile Number</label>
                                <input id="phone_number" placeholder="phone number" class="form-control"
                                    type="phone_number" />
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Address</label>
                                <input id="address" placeholder="Address" class="form-control" type="text" />
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Password</label>
                                <input id="password" placeholder="User Password" class="form-control"
                                    type="password" />
                            </div>
                        </div>
                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2">
                                <button onclick="onRegistration()"
                                    class="btn mt-3 w-100  bg-gradient-primary">Complete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    async function onRegistration() {
        let email = document.getElementById('email').value;
        let name = document.getElementById('name').value;
        let address = document.getElementById('address').value;
        let phone_number = document.getElementById('phone_number').value;
        let password = document.getElementById('password').value;

        if (email.length === 0) {
            errorToast("email is required");
        } else if (name.length === 0) {
            errorToast("Name is required")
        } else if (address.length === 0) {
            errorToast("Address is required")
        } else if (phone_number.length === 0) {
            errorToast("mobile number is required")
        } else if (password.length === 0) {
            errorToast("password is required")
        } else {
            showLoader()
            let res = await axios.post("/customer_registration", {
                email: email,
                name: name,
                address: address,
                phone_number: phone_number,
                password: password
            });
            // console.log(res.data);
            hideLoader();
            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                setTimeout(function() {
                    window.location.href = "/userLogin"
                }, 1000);
            } else {
                errorToast(res.data['message'])
            }
        }
    }
</script>

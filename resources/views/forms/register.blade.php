@extends('travelista-layout.master')
@section('content')
    <!-- start banner Area -->
    <section class="about-banner relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Welcome
                    </h1>
                    <p class="text-white link-nav"><a href="{{ url('/') }}">Home </a> <span
                            class="lnr lnr-arrow-right"></span> <a href="{{ url('/register') }}"> register</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-12">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-12 col-lg-10 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                    <form class="mx-1 mx-md-4" onsubmit="return validateForm()" method="post"
                                        action="{{ url('/register-process') }}">
                                        @csrf
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" name="name"
                                                    class="form-control" placeholder="enter name" />

                                            </div>
                                        </div>
                                        <div class="text text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="form3Example3c" name="email"
                                                    class="form-control" placeholder="enter email" />

                                            </div>
                                        </div>
                                        <div class="text text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="password" placeholder="enter password"
                                                    name="password" class="form-control" />

                                            </div>
                                        </div>
                                        <div class="text text-danger">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="password_confirmation"
                                                    placeholder="confirm password" name="confirm-password"
                                                    class="form-control" />
                                                <div id="passwordError" class="text text-danger">
                                                    @error('confirm-password')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa fa-mobile fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example3c" name="mobile_number"
                                                    class="form-control" placeholder="enter number" />

                                            </div>
                                        </div>
                                        <div class="text text-danger">
                                            @error('mobile_number')
                                                {{ $message }}
                                            @enderror
                                        </div>

                                        <div class="form-check d-flex justify-content-left mb-5">
                                            {!! NoCaptcha::renderJs() !!}
                                            {!! NoCaptcha::display() !!}
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" name="save"
                                                class="btn btn-dark btn-lg">Register</button>
                                        </div>

                                    </form>
                                    <h4 style="color: black">Have account ?<a href="{{ url('/login') }}">login
                                        </a> </h4>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                        class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.getElementById('password_confirmation').addEventListener('input', function() {
            var password = this.value;
            var confirmPassword = document.getElementById('password').value;

            if (password !== confirmPassword) {
                document.getElementById('passwordError').innerHTML = 'Passwords do not match.';
            } else {
                document.getElementById('passwordError').innerHTML = '';
            }
        });

        function validateForm() {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('password_confirmation').value;

            if (password !== confirmPassword) {
                document.getElementById('passwordError').innerHTML = 'Passwords do not match.';
                return false; // Prevent form submission
            } else {
                document.getElementById('passwordError').innerHTML = '';
                return true; // Allow form submission
            }
        }
    </script>
@endsection

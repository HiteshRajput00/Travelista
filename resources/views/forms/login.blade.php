@extends('travelista-layout.master')
@section('content')
<!-- start banner Area -->
<section class="about-banner relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Welcome	Back			
                </h1>	
                <p class="text-white link-nav"><a href="{{ url('/') }}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ url('/login') }}"> login</a></p>
            </div>	
        </div>
    </div>
</section>
<!-- End banner Area -->	
<style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }

    .h-custom {
        height: calc(100% - 73px);
    }

    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }
</style>
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img style="opacity: 0.3;"
                    src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                    class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form class="mt-5 mb-5 login-input" method="post" action="{{ url('/login-process') }}">
                    @csrf
                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                        <button type="button" class="btn btn-light btn-floating mx-1">
                            <i class="fa fa-facebook-f"></i>
                        </button>

                        <a href="" class="btn btn-light btn-floating mx-1">
                            <i class="fa fa-google"></i>
                        </a>

                        {{-- <button type="button" class="btn btn-light btn-floating mx-1">
                        <div class="g-signin2" data-onsuccess="onSignIn"></div>
                    </button> --}}
                    </div>

                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">Or</p>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <label class="form-label" for="form3Example3">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Enter your password" required>
                        <div class="input-group-append">
                            <button type="button" id="show-Password" class="btn btn-outline-secondary">
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    @if (session('msg'))
                        <div class="text text-danger">{{ session('msg') }} </div>
                    @endif

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    <br>
                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}
                    <div class="text text-danger">
                        @error('g-recaptcha-response')
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button class="btn login-form__btn submit  btn-dark" type="submit" name="log">LogIn</button>

                        <p style="color: black" class=" fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{ url('/register') }}"
                                class="link-danger">Register</a></p>
                        <a href="{{ url('/Send-recover-link') }}" class="link-danger">Forgot password ?</a>
                        <div class="divider d-flex align-items-center my-4">
                            <p style="color: black" class="text-center fw-bold mx-3 mb-0"> or</p>
                        </div>
                        <a href="{{ url('/otp-Authentication') }}" class="link-danger">By verification code </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const togglePasswordButton = document.getElementById('show-Password');

            togglePasswordButton.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Toggle eye icon
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
        });
    </script>
@endsection

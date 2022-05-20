@extends('layouts.welcome')

@section('css')
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <style>
        @media screen and (min-width: 999px) {
        #cont {
          width: 600px;  
        }
        }
        header.masthead {
            padding-top: 8rem;
            padding-bottom: calc(10rem - 3.2rem);
            background: linear-gradient(to bottom, rgba(92, 77, 66, 0.8) 0%, rgba(92, 77, 66, 0.8) 100%), url("../../img/bg4.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-size: cover;
        }
    </style>
@endsection

@section('title')
    MMS
@endsection

@section('content')
<div class="container px-4 px-lg-5 h-100" id="cont">
    <div class="card card-primary" style="border-top: 2px solid rgb(116 177 151); background-color: rgba( 223, 255, 255, 0.4); border-radius: 25px;">
        <div class="card-header"><h4>Login</h4></div>
        <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
                @csrf
                @if (session()->has('error'))
                        <input type="hidden" id="errorMessage" value="{{ session()->get('error') }}">
                @endif
                <div class="form-group">
                    <label for="username" style="color: black; font-size:15px; font-weight: bold;">Username</label>
                    <input aria-describedby="emailHelpBlock" id="username" type="text"
                           class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username"
                           placeholder="Enter Username" tabindex="1"
                           value="{{ (Cookie::get('username') !== null) ? Cookie::get('username') : old('username') }}" autofocus
                           required>
                    <div class="invalid-feedback">
                        {{ $errors->first('username') }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label" style="color: black; font-size:15px; font-weight: bold;">Password</label>
                        <div class="float-right">
                            <a href="{{ route('password.request') }}" style="color: #282b3c; font-size:15px; font-weight: bold;" class="text-small">
                                Forgot Password?
                            </a>
                        </div>
                    </div>
                    <input aria-describedby="passwordHelpBlock" id="password" type="password"
                           value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}"
                           placeholder="Enter Password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password"
                           tabindex="2" required>
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                               id="remember"{{ (Cookie::get('remember') !== null) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remember" style="color: #282b3c; font-size:13px; font-weight: bold;">Remember Me</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-block" style="background-color: rgb(116 177 151); color: white; font-size: 15px;" tabindex="4">
                        Login
                    </button>
                </div>
            </form>
            <div class="mt-5 text-muted text-center">
        Don't have an account ? <a
                href="{{ route('register') }}">Sign Up</a>
    </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    $(document).ready(function(){
        if(!($("#errorMessage").val()===undefined)){
            swal.fire({
                icon: "error",
                title: "Invalid Credentials",
                showConfirmButton: false,
                timer: 3000,
                text: "Maybe Your Account is not Approved or has been deleted try to contact your administrator"
            });
        }
    });
</script>
@endsection

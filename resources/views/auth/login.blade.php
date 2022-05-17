@extends('layouts.auth_app')
@section('title')
    Login
@endsection
@section('content')
    <div class="card card-primary" style="border-top: 2px solid rgb(116 177 151); background-color: rgba( 223, 255, 255, 0.4); border-radius: 25px;">
        <div class="card-header"><h4>Login</h4></div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                @if (session()->has('error'))
                    <div class="alert alert-danger p-0">
                        <input type="hidden" id="errorMessage" value="{{ session()->get('error') }}">
                    </div>
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
        </div>
    </div>
    <div class="mt-5 text-muted text-center">
        Don't have an account ? <a
                href="{{ route('register') }}">Sign Up</a>
    </div>
@endsection

@section('javascript')
<script>
    $(document).ready(function(){
        $(window).on( "load", function() {
        if(!($("#errorMessage").val()===undefined)){
            swal.fire({
                icon: "error",
                title: "Invalid Credentials",
                showConfirmButton: false,
                timer: 5000,
                text: "Maybe Your Account is not Approved or has been deleted try to contact your administrator"
            });
        }
        })
    });
</script>
@endsection

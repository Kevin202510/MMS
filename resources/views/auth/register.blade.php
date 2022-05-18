@extends('layouts.welcome')

@section('title')
    MMS
@endsection

@section('css')
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<div class="container px-4 px-lg-5 h-100" style="width: 600px;">
    <div class="card card-primary" style="height: 550px; border-top: 2px solid rgb(116 177 151); background-color: rgba( 223, 255, 255, 0.4); border-radius: 25px;">
        <div class="card-header"><h4>Register</h4></div>
        <div class="card-body">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="role_id" id="role_id" value="2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">First Name</label><span
                                    class="text-danger">*</span>
                            <input id="fname" type="text"
                                   class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}"
                                   name="fname"
                                   tabindex="1" placeholder="Enter First Name" value="{{ old('fname') }}"
                                   autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('fname') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Last Name</label><span
                                    class="text-danger">*</span>
                            <input id="lname" type="text"
                                   class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}"
                                   placeholder="Enter Last Name" name="lname" tabindex="1"
                                   value="{{ old('lname') }}"
                                   required autofocus>
                            <div class="invalid-feedback">
                                {{ $errors->first('lname') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address</label><span
                                    class="text-danger">*</span>
                            <input id="address" type="text"
                                   class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                   name="address"
                                   tabindex="1" placeholder="Enter Address" value="{{ old('address') }}"
                                   autofocus required>
                            <div class="invalid-feedback">
                                {{ $errors->first('address') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contact">Contact</label><span
                                    class="text-danger">*</span>
                            <input id="contact" type="number"
                                   class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}"
                                   placeholder="Enter Contact Number" name="contact" tabindex="1"
                                   value="{{ old('contact') }}"
                                   required autofocus>
                            <div class="invalid-feedback">
                                {{ $errors->first('contact') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="username">Username</label><span
                                    class="text-danger">*</span>
                            <input id="username" type="text"
                                   class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                   placeholder="Enter Username" name="username" tabindex="1"
                                   value="{{ old('username') }}"
                                   required autofocus>
                            <div class="invalid-feedback">
                                {{ $errors->first('username') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="control-label">Password</label><span
                                    class="text-danger">*</span>
                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}"
                                   placeholder="Set account password" name="password" tabindex="2" required>
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password_confirmation"
                                   class="control-label">Confirm Password</label><span
                                    class="text-danger">*</span>
                            <input id="password_confirmation" type="password" placeholder="Confirm password"
                                   class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid': '' }}"
                                   name="password_confirmation" tabindex="2">
                            <div class="invalid-feedback">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-block" style="background-color: rgb(116 177 151); color: white; font-size: 15px;" tabindex="4">
                            Register
                        </button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="mt-2 text-muted text-center">
                Don't have an account ? <a href="{{ route('login') }}">Sign Up</a>
            </div>
        </div>
    </div>
</div>
@endsection
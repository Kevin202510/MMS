@extends('layouts.welcome')

@section('title')
    MMS
@endsection

@section('css')
    <style>
        @media (min-width: 992px) {
        header.masthead {
            height: 100vh;
            min-height: 40rem;
            padding-top: 4.5rem;
            padding-bottom: 0;
        }
        }

        header.masthead {
            padding-top: 10rem;
            padding-bottom: calc(10rem - 4.5rem);
            background: linear-gradient(to bottom, rgba(92, 77, 66, 0.8) 0%, rgba(92, 77, 66, 0.8) 100%), url("../../img/bg4.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-size: cover;
        }

    </style>
@endsection
@section('content')
<div class="container px-4 px-lg-5 h-100">
    <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-8 align-self-end">
            <h1 class="text-white font-weight-bold">Mushroom Monitoring System</h1>
            <hr class="divider" />
        </div>
        <div class="col-lg-8 align-self-baseline">
            <p class="text-white-75 mb-5">A Mushroom Monitoring System is a RealTime Monitoring for Bote Mushroom House located at Barangay Rio Chico General Tinio Nueva Ecija.</p>
            <a class="btn btn-primary btn-xl" href="{{ route('login') }}">Find Out More</a>
        </div>
    </div>
</div>
@endsection


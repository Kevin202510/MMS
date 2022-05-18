@extends('layouts.welcome')

@section('title')
    MMS
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
<div id="portfolio">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="{{ asset('img/bg4.jpg') }}" title="Project Name">
                    <img class="img-fluid" src="{{ asset('img/bg4.jpg') }}" alt="..." />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">Category</div>
                        <div class="project-name">Project Name</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="{{ asset('img/bg4.jpg') }}" title="Project Name">
                    <img class="img-fluid" src="{{ asset('img/bg4.jpg') }}" alt="..." />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">Category</div>
                        <div class="project-name">Project Name</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="{{ asset('img/bg4.jpg') }}" title="Project Name">
                    <img class="img-fluid" src="{{ asset('img/bg4.jpg') }}" alt="..." />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">Category</div>
                        <div class="project-name">Project Name</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="{{ asset('img/bg4.jpg') }}" title="Project Name">
                    <img class="img-fluid" src="{{ asset('img/bg4.jpg') }}" alt="..." />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">Category</div>
                        <div class="project-name">Project Name</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="{{ asset('img/bg4.jpg') }}" title="Project Name">
                    <img class="img-fluid" src="{{ asset('img/bg4.jpg') }}" alt="..." />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">Category</div>
                        <div class="project-name">Project Name</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6">
                <a class="portfolio-box" href="{{ asset('img/bg4.jpg') }}" title="Project Name">
                    <img class="img-fluid" src="{{ asset('img/bg4.jpg') }}" alt="..." />
                    <div class="portfolio-box-caption">
                        <div class="project-category text-white-50">Category</div>
                        <div class="project-name">Project Name</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    </div>
@endsection


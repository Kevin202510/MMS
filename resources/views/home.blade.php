@extends('layouts.app')

@section('title')
    MMS
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <!-- <form id="samplemessage" method="post" action="{{url('notify')}}">
        {{csrf_field()}}
            <input type="text" id="status" name="message">
            <input type="text" id="sensorname" name="sensor_name">
        </form> -->
        <div class="section-body">
            @include('layouts.dashdata')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5><i class="fas fa-leaf" style="color:#22f545;"></i> <span id="config_name"></span></h5>
                        </div>
                        <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Temperature Sensor</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="temperatureChart"></canvas>
                                        <center id="tempstat"></center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 style="color: #f27e1f;">Humidity Sensor</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="humidityChart"></canvas>
                                        <center id="humiditystat"></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 style="color: #c5c9c9;">Light Sensor</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="lightChart"></canvas>
                                        <center id="lightstat"></center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 style="color: #38fcae;">Carbon Dioxide Sensor</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="co2Chart"></canvas>
                                        <center id="co2stat"></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row justify-content-center">
                            <div class="col-12 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 style="color: #62f5ed;">Water Level Sensor</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="waterLevelChart"></canvas>
                                        <center id="waterlevelstat"></center>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
<script type="module" src="{{ asset('js/dashboard/chartData.js') }}"></script>
@endsection



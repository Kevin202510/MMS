@extends('layouts.app')

@section('title')
    MMS
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Temperature Sensor</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="temperatureChart"></canvas>
                                        <center><div class="badge badge-success">Good</div></center>
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
                                        <center><div class="badge badge-success">Good</div></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 style="color: #ab8363;">Soil Moisture Sensor</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="soilMoistureChart"></canvas>
                                        <center><div class="badge badge-success">Good</div></center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 style="color: #79f78c;">Carbon Dioxide Sensor</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="co2Chart"></canvas>
                                        <center><div class="badge badge-success">Good</div></center>
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
                                        <center><div class="badge badge-success">Good</div></center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 style="color: #62f5ed;">Water Level Sensor</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="waterLevelChart"></canvas>
                                        <center><div class="badge badge-success">GOOD</div></center>
                                    </div>
                                </div>
                            </div>
                        </div>
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



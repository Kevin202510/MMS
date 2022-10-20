@extends('layouts.app')

@section('title')
    MMS
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Lights</h3>
            <div class="section-header-breadcrumb">
            <button type="button" class="btn btn-primary">Generate Report <i class="far fa-file-invoice"></i></button>
            </div>
        </div>
        <div class="section-body">
        <div class="row justify-content-md-center">
          <div class="col-12 col-md-8">
              <div class="card">
                  <div class="card-header">
                      <h4 style="color: #c5c9c9;">Light Sensor</h4>
                  </div>
                  <div class="card-body">
                      <canvas style="display: block; width: 1002px; height: 180px;" id="lightChart"></canvas>
                      <center id="lightstat"></center>
                  </div>
              </div>
          </div>
        </div>
        <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Lights Sensor Data</h4>
                    <div class="card-header-form">
                    <!-- <div class="card-header-form"> -->
                    <div class="badge badge-warning" id="warning"></div>
                    <div class="badge badge-success" id="success"></div>
                    <div class="badge badge-danger" id="danger"></div>   
                    <!-- <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form> -->
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Light Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody id="table-main"></tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
<script type="module" src="{{ asset('js/light/light.js') }}"></script>
@endsection


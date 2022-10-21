@extends('layouts.app')

@section('title')
    MMS
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Sensor Configuration History</h3>
        </div>
        <div class="section-body">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Configuration History</h4>
                    <div class="card-header-form">
                    <div class="text-right" style="margin-bottom:15px;">
                          <a href="javascript:void(0)" id="btn-new"></a>
                      </div>
                     <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Configuration Name</th>
                                    <th>Deleted At</th>
                                    <th>Action</th>
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
    @include('sensors_configuration/modal')
@endsection

@section('javascript')
<script type="module" src="{{ asset('js/sensors_configuration/index2.js') }}"></script>
@endsection
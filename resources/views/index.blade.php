@extends('layouts.master')
@section('title','laravel')
@section('content')
    
<div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total user</h4>
                  </div>
                  <div class="card-body">
                   {{Auth::user()->count()}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-truck"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Supplier</h4>
                  </div>
                  <div class="card-body">
                    {{$supplier}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-list-alt"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Item</h4>
                  </div>
                  <div class="card-body">
                  {{$item}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-user-plus"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Customer</h4>
                  </div>
                  <div class="card-body">
                  {{$customer}}
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@push('page-script')
<script src="{{asset('assets/stisla/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('assets/js/page/modules-chartjs.js')}}"></script>
@endpush
    

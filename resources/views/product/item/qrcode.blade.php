@extends('layouts.master')
@section('title','laravel')
@section('content')
<div class="section-body">
  
        <div class="card">
            <div class="card-header">
                <div class="col-12 col-md-6 col-lg-6">
                 
                    {{-- <a href="" target="" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Print  qrcode</a> --}}
           
                </div>
            </div>
            
            <div class="card-body">
               {{$qrcode}}
            
            </div>

           
        </div>
</div>
@endsection
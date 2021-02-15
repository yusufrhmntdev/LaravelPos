@extends('layouts.master')
@section('title','laravel')
@section('content')
    
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4>Tambah Data</h4>
                <a href="{{route('customer.index')}}" class="btn btn-warning btn-sm ml-auto" ><i class="fa fa-undo"></i> kembali</a>
              </div>
              <div class="card-body">
                <form action="{{route('customer.store')}}" method="POST">
                  @csrf
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                          <label @error('nama_customer')
                              class="text-danger"
                          @enderror>Customer Name* @error('nama_customer')
                              | {{$message}}
                          @enderror</label>
                          <input type="text" class="form-control" name="nama_customer" value="{{old('nama_customer')}}" placeholder="Customer Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label @error('phone')
                            class="text-danger"
                        @enderror>Phone* @error('phone')
                            | {{$message}}
                        @enderror</label>
                        <input type="number" class="form-control" name="phone" value="{{old('phone')}}" placeholder="0822XXXXXXXX">
                          </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label @error('alamat')
                          class="text-danger"
                      @enderror>Address @error('address')
                          | {{$message}}
                      @enderror</label>
                      <textarea class="form-control"name="address" value="{{old('address')}}" placeholder="Jl.xxxxxxx"></textarea>
                      {{-- <input type="number" class="form-control" name="address" value="{{old('address')}}" placeholder="0822XXXXXXXX"> --}}
                        </div>
                    </div>
                      </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary mr-1" type="submit">Submit </button>
                        <button class="btn btn-success" type="reset">Reset </button>
                    </div>
              </form>
      </div>
</div>
@endsection

@push('page-scripts')
    
@endpush
    

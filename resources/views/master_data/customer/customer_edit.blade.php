@extends('layouts.master')
@section('title','laravel')
@section('content')
    
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4>Edit Data </h4>
                <a href="{{route('customer.index')}}" class="btn btn-warning btn-sm ml-auto" ><i class="fa fa-undo"></i> kembali</a>
                
              </div>
              <div class="card-body">
                <form action="{{route('customer.update',$customer->id)}}" method="POST">
                  @csrf
                  @method('patch')
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                          <label @error('nama_customer')
                              class="text-danger"
                          @enderror>Customer Name @error('nama_customer')
                              | {{$message}}
                          @enderror</label>
                          <input type="text" class="form-control" name="nama_customer" 
                          @if (old('nama_customer'))
                              value="{{old('nama_customer') }}"
                              @else
                              value="{{$customer->nama_customer}}"
                          @endif 
                          placeholder="Customer Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label @error('phone')
                            class="text-danger"
                        @enderror>phone @error('phone')
                            | {{$message}}
                        @enderror</label>
                        <input type="number" class="form-control" name="phone" 
                                @if (old('phone'))
                                value="{{old('phone') }}"
                                @else
                                value="{{$customer->phone}}"
                               @endif 
                                placeholder="082xxxxxx">
                          </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label @error('address')
                          class="text-danger"
                      @enderror>address @error('address')
                          | {{$message}}
                      @enderror</label>
                      <textarea class="form-control" name="address" placeholder="Jl.xxxxx"> @if(old('address')){{Input::old('address')}}@else{{$customer->address}} @endif</textarea>         
                        </div>
                    </div>
                      </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary" type="submit">Submit </button>
                        <button class="btn btn-success" type="reset">Reset </button>
                    </div>
              </form>
      </div>
</div>
@endsection

@push('page-scripts')
    
@endpush
    

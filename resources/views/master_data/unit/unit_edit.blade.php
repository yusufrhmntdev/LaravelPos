@extends('layouts.master')
@section('title','laravel')
@section('content')
    
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4>Edit Data</h4>
                <a href="{{route('unit.index')}}" class="btn btn-warning btn-sm ml-auto" ><i class="fa fa-undo"></i> kembali</a>
              </div>
              <div class="card-body">
                <form action="{{route('unit.update',$unit->id)}}" method="POST">
                  @csrf
                  @method('patch')
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                              <label @error('nama_unit')
                                  class="text-danger"
                              @enderror>Unit Name @error('nama_unit')
                                  | {{$message}}
                              @enderror</label>
                              <input type="text" class="form-control" name="nama_unit" required
                              @if (old('nama_unit'))
                                  value="{{old('nama_unit') }}"
                                  @else
                                  value="{{$unit->nama_unit}}"
                              @endif 
                              placeholder="unit Name">
                                </div>
                          </div>
                      </div>
                      <div class="form-group">
                      <button class="btn btn-primary mr-1" type="submit">Submit </button>
                      <button class="btn btn-success" type="reset">Reset </button>
                  </div>
              </form>
      </div>
</div>
@endsection

@push('page-scripts')
    
@endpush
    

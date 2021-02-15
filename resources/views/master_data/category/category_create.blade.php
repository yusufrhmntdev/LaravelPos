@extends('layouts.master')
@section('title','laravel')
@section('content')
    
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4>Tambah Data</h4>
                <a href="{{route('category.index')}}" class="btn btn-warning btn-sm ml-auto" ><i class="fa fa-undo"></i> kembali</a>
              </div>
              <div class="card-body">
                <form action="{{route('category.store')}}" method="POST">
                  @csrf
                        <div class="row">
                            <div class="col-md-5 col-md-offset-5">
                                <div class="form-group">
                                      <label @error('nama_category')
                                              class="text-danger"
                                          @enderror>category Name* @error('nama_category')
                                              | {{$message}}
                                          @enderror
                                        </label>
                                      <input type="text" class="form-control" name="nama_category" value="{{old('nama_category')}}" placeholder="category Name" required>
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
    

@extends('layouts.master')
@section('title','laravel')
@section('content')
    
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4>Edit Data</h4>
              </div>
              <div class="card-body">
                <form action="{{route('category.update',$category->id)}}" method="POST">
                  @csrf
                  @method('patch')
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                              <label @error('nama_category')
                                  class="text-danger"
                              @enderror>Category Name @error('nama_category')
                                  | {{$message}}
                              @enderror</label>
                              <input type="text" class="form-control" name="nama_category" required
                              @if (old('nama_category'))
                                  value="{{old('nama_category') }}"
                                  @else
                                  value="{{$category->nama_category}}"
                              @endif 
                              placeholder="category Name">
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
    

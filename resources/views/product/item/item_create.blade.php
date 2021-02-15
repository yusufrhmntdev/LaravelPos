@extends('layouts.master')
@section('title','laravel')
@section('content')
    
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4>Tambah Data</h4>
                <a href="{{url()->previous()}}" class="btn btn-warning btn-sm ml-auto" ><i class="fa fa-undo"></i> kembali</a>
              </div>
              <div class="card-body">
                <form action="{{route('item.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                          <label @error('nama_item')
                              class="text-danger"
                          @enderror>Item Name* @error('nama_item')
                              | {{$message}}
                          @enderror</label>
                          <input type="text" class="form-control" name="nama_item" value="{{old('nama_item')}}" placeholder="item Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label @error('type') class="text-danger" @enderror>Category* 
                              @error('type')|
                              {{$message}}
                            @enderror</label>
                            <select class="form-control select2" name="category_id" required>
                              <option>Pilih Category</option>
                              @foreach ($category as $category_data)
                              <option value="{{$category_data->id}}">{{$category_data->nama_category}} </option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label @error('type') class="text-danger" @enderror>Unit* 
                                @error('type')|
                                {{$message}}
                              @enderror</label>
                              <select class="form-control select2" name="unit_id" required>
                                <option>Pilih Unit</option>

                                @foreach ($unit as $unit_data)
                                    <option value="{{$unit_data->id}}">{{$unit_data->nama_unit}} </option>
                                @endforeach
                              
                              </select>
                            </div>
                          </div>
                      <div class="col-md-6">
                            <div class="form-group">
                                  <label @error('price')
                                  class="text-danger"
                              @enderror>Price @error('price')
                                  | {{$message}}
                              @enderror</label>
                              <input type="text" class="form-control" name="price" value="{{old('price')}}" placeholder="price" required>
                              </div>
                        </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label @error('image') class="text-danger" @enderror>Image 
                            @error('image')|
                            {{$message}}
                          @enderror</label>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" name="image">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                          </div>
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
    

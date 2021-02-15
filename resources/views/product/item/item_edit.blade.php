@extends('layouts.master')
@section('title','laravel')
@section('content')
    
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4>Edit  Data</h4>
                <a href="{{url()->previous()}}" class="btn btn-warning btn-sm ml-auto" ><i class="fa fa-undo"></i> kembali</a>
              </div>
              <div class="card-body">
                <form action="{{route('item.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('patch')
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                          <label @error('nama_item')
                              class="text-danger"
                          @enderror>Item Name* @error('nama_item')
                              | {{$message}}
                          @enderror</label>
                          <input type="text" class="form-control" name="nama_item" @if(old('nama_unit'))value="{{old('nama_item')}}"
                          @else
                          value="{{$item->nama_item}}"
                          @endif placeholder="item Name" required>
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
                              <option value="{{$category_data->id}}"{{$category_data->id == $item->category_id ? "selected" : null}} >{{$category_data->nama_category}}</option>
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
                                <option value="{{$unit_data->id}}"{{$unit_data->id == $item->unit_id ? "selected" : null}} >{{$unit_data->nama_unit}}</option>
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
                              <input type="text" class="form-control" name="price" @if (old('price'))
                              value="{{old('price')}}"
                              @else
                              value="{{$item->price}}"
                              @endif  placeholder="price" required>
                              </div>
                        </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label @error('image') class="text-danger" @enderror>Image 
                            @error('image')|
                            {{$message}}
                          @enderror</label>  <small style="color:red"> (biarkan kosong jika tidak ada gambar yang mau di ganti)</small>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="customFile" name="image">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                          </div>
                          @if ($item->image != null)
                          <div style="margin-bottom: 4px">
                            <img src="{{asset('assets/images/item/'.$item->image) }}" class="img-circle" width="100px">
                            </div>
                          @endif
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
    

@extends('layouts.master')
@section('title','laravel')
@section('content')
    
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4>Edit  Data</h4>
                <a href="{{route('supplier.index')}}" class="btn btn-warning btn-sm ml-auto" ><i class="fa fa-undo"></i> kembali</a>
              </div>
              <div class="card-body">
                <form action="{{route('supplier.update',$supplier->id)}}" method="POST">
                  @csrf
                  @method('patch')
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                          <label @error('nama_supplier')
                              class="text-danger"
                          @enderror>supplier Name* @error('nama_supplier')
                              | {{$message}}
                          @enderror</label>
                          <input type="text" class="form-control" name="nama_supplier"
                          @if (old('nama_supplier'))
                          value="{{old('nama_supplier') }}"
                          @else
                          value="{{$supplier->nama_supplier}}"
                         @endif  placeholder="supplier Name" required>
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                          <div class="form-group">
                            <label @error('type') class="text-danger" @enderror>Type* 
                              @error('type')|
                              {{$message}}
                            @enderror</label>
                            <select class="form-control select2" name="type" required>
                              <option>----Pilih Type----</option>
                              <option value={{$supplier->type ==1 ?'selected': ''}}>ATK</option>
                              <option value={{$supplier->type ==2 ?'selected': ''}}>Sembako</option>
                            </select>
                          </div>
                        </div> --}}
                      <div class="col-md-6">
                            <div class="form-group">
                                  <label> Address</label>
                                        <textarea class="form-control" name="address">{{$supplier->address}}</textarea>
                            </div>
                      </div>
                      <div class="col-md-6">
                            <div class="form-group">
                                  <label @error('email')
                                  class="text-danger"
                              @enderror>Email @error('email')
                                  | {{$message}}
                              @enderror</label>
                              <input type="text" class="form-control" name="email"
                              @if (old('email'))
                              value="{{old('email')}}"
                              @else
                              value="{{$supplier->email}}"
                              @endif placeholder="example@example.com" required>
                              </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                                <label @error('phone')
                                class="text-danger"
                            @enderror>phone* @error('phone')
                                | {{$message}}
                            @enderror</label>
                            <input type="number" class="form-control" name="phone" 
                            @if (old('phone'))
                            value="{{old('phone') }}"
                            @else
                            value="{{$supplier->phone}}"
                           @endif 
                            placeholder="082xxxxxx">
                            </div>
                      </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                    <label> Desc</label>
                                      <textarea class="form-control" name="desc" >{{ $supplier->desc}}</textarea>
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
    

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
                <form action="{{route('in.store')}} " method="POST" enctype="multipart/form-data">
                  @csrf
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label @error('date')
                                class="text-danger"
                            @enderror>Date* @error('date')
                                | {{$message}}
                            @enderror</label>
                            <input type="date" class="form-control" name="date" value="{{date('Y-m-d')}}" required>
                              </div>
                          </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label @error('barcode')
                                        class="text-danger"
                                    @enderror>Barcode* @error('barcode')
                                        | {{$message}}
                                    @enderror</label>
                                    <div class="input-group mb-3">
                                            <input type="hidden" name="item_id" id="item_id">
                                            <input type="text" class="form-control" name="barcode" id="barcode" placeholder="" aria-label="">
                                             <div class="input-group-append">
                                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-item"><i class="fa fa-search"></i></button>
                                            </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> *Item Name</label>
                                <input class="form-control" type="text"  name="item_name" id="item_name" placeholder="Item name" readonly>
                              </div>
                          </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="item_unit"> *Item Unit</label>
                                  <input type="text" name="unit_name" id="unit_name"  placeholder=" Item iunit " class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="item_unit"> *Inital Stock </label>
                                  <input type="text" name="stock" id="stock"  class="form-control" readonly>
                            </div>
                        </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                  <label @error('Detail')
                                  class="text-danger"
                              @enderror>Detail @error('Detail')
                                  | {{$message}}
                              @enderror</label>
                              <textarea class="form-control"name="detail" value="{{old('Detail')}}" placeholder="Detail....." required></textarea>
                              </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label @error('supplier_id') class="text-danger" @enderror>Supplier* 
                              @error('supplier_id')|
                              {{$message}}
                            @enderror</label>
                            <select class="form-control select2" name="supplier_id" required>
                              <option>Pilih Supplier</option>
                              @foreach ($supplier as $supplier_data)
                              <option value="{{$supplier_data->id}}">{{$supplier_data->nama_supplier}} </option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label @error('qty')
                                    class="text-danger"
                                @enderror>qty @error('qty')
                                    | {{$message}}
                                @enderror</label>
                                <input type="text" class="form-control" name="qty" value="{{old('qty')}}" placeholder="qty" required>
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

{{-- awal modal --}}
@section('modal')
<!-- < modal add > -->
<div class="modal fade"  id="modal-item">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body modal-xl table-responsive">
                <table class="table table-bordered table-striped" id="table-1">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th> Barcode</th>
                            <th> Name </th>
                            <th> Unit </th>
                            <th> Price </th>
                            <th> Stock </th>
                            <th> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item as $no => $data)
                                 
                            
                        <tr>
                            <td>{{++$no}}</td>
                            <td>{{$data->barcode}}</td>
                            <td>{{$data->nama_item}}</td>
                            <td>{{$data->unit->nama_unit}}</td>
                            <td>@currency($data->price)</td>
                            <td>{{$data->stock}}</td>
                            <td>
                                <button class="btn btn-samll btn-info" id="select" 
                                  data-item_id="{{$data->id}}"
                                  data-barcode="{{$data->barcode}}"
                                  data-name="{{$data->nama_item}}"
                                  data-unit_name="{{$data->unit->nama_unit}}"
                                  data-price="{{$data->price}}"
                                  data-stock="{{$data->stock}}" >
                                   <i class="fa fa-check"></i>Select
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
             </table>
           </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
{{-- akhir modal --}}

@endsection

@push('page-script')
<script src="{{asset('assets/js/page/modules-datatables.js')}}"></script>
<script>
    $(document).ready(function(){
        $(document).on('click', '#select', function() {
            var item_id= $(this).data('item_id');
            var barcode= $(this).data('barcode');
            var name= $(this).data('name');
            var unit_name= $(this).data('unit_name');
            var stock= $(this).data('stock');
            $('#item_id').val(item_id);
            $('#barcode').val(barcode);
            $('#item_name').val(name);
            $('#unit_name').val(unit_name);
            $('#stock').val(stock);
            $('#modal-item').modal('hide');

        })
    })
</script>
    
@endpush


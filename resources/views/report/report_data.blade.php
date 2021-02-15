@extends('layouts.master')
@section('title','laravel')
@section('content')
    
<div class="section-body">
        <div class="card">
            <div class="card-header">
                <div class="col-12 col-md-6 col-lg-6">
                    {{-- <a href="{{route('unit.create')}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>Tambah data</a>
                    <button id="btnDel" type="button" class="btn btn-danger ml-2 btnDel" data-url="{{ url('deleteAll') }}"><i class="fa fa-trash"></i> Hapus Checked</button> --}}
                    {{-- <h1>Total Harga : {{$sum}}</h1> --}}
                    {{-- <button type="button" name="bulk_delete" id="bulk_delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus Checked</button> --}} 
                    <h4> Cetak Invoice </h4>
                </div>
            </div>
            
            <div class="card-body">
                @if($sale->count() > 0)
                <div class="table-responsive">
                <table class="table table-striped text-center" id="table-1">
                    <thead class="thead-dark">
                    <tr>
                        {{-- <th ><input type="checkbox" id="checkBoxAll"></th> --}}
                        <th scope="col">#</th>
                        <th scope="col">Invoice</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Grand Total </th>
                        <th scope="col">Action</th>
                    
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($sale as $no => $data)
                        <tr>
                            {{-- <td><input type="checkbox" class="custom-checkbox cekbox" data-id="{{$data->id}}"></td> --}}
                                <td>{{++$no}}</td>
                                <td>{{$data->invoice}}</td>
                                <td>{{$data->customer->nama_customer}}</td>
                                <td>Rp.{{number_format($data->final_price)}}</td>
                                <td>
                                    <a href="{{route('cetakinv',$data->id)}}" target="_blank" class="btn btn-icon icon-left btn-primary btn-sm"><i class="fa fa-print"></i> Print</a>
                                    {{-- <a href="#" data-id="{{$data->id}}"class="btn btn-icon icon-left btn-danger btn-sm swal-confrim">
                                  
                                        <form action="{{route('unit.destroy',$data->id)}}" id="delete{{$data->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                        </form>
                                            <i class="fas fa-times"></i>
                                        Delete</a> --}}
                                    
                                </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
                @else 
               <h4 class="text-center"> Data Not Found </h4>
                @endif
                </div>
            </div>
        </div>
</div>
@endsection


@push('page-script')
{{-- @once
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>
@endonce --}}
<script src="{{asset('assets/js/page/modules-datatables.js')}}"></script>
<script>
$(".swal-confrim").click(function(e) {
    id = e.target.dataset.id; // ambil targeet id dari element dataset(data-id)
    swal({
        title: 'Yakin nih mao di apus?',
        text: 'ane mau ngasih tau,data kagak bisa di balikin kalo dah di apus',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
        swal('Mantap! Data berhasil di hapus coy ', {
          icon: 'success',
        });
        $(`#delete${id}`).submit();
        } else {
        swal('data kagak jadi di apus');
        }
      });
  });
//   $('#checkBoxAll').click(function () {
//             if ($(this).is(":checked")) {
//                 $(".cekbox").prop("checked", true)
//             }
//             else {
//                 $(".cekbox").prop("checked", false)
//             }
//         });
//         $('#btnDel').on('click', function(e) {


//             var allVals = [];  
//             $(".cekbox:checked").each(function() {  
//                 allVals.push($(this).attr('data-id'));
//             });  


//             if(allVals.length <=0)  
//             {  
//                 alert("Please select row.");  
//             }  else {  


//                 var check = confirm("Are you sure you want to delete this row?");  
//                 if(check == true){  


//                     var join_selected_values = allVals.join(","); 


//                     $.ajax({
//                         url: $(this).data('url'),
//                         type: 'DELETE',
//                         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//                         data: 'ids='+join_selected_values,
                      
                    
//                         success: function (data) {
//                             if (data['success']) {
//                                 $(".sub_chk:checked").each(function() {  
//                                     $(this).parents("tr").remove();
//                                 });
//                                 alert(data['success']);
//                                 location.reload();
//                             } else if (data['error']) {
//                                 alert(data['error']);
//                             } else {
//                                 alert('Whoops Something went wrong!!');
//                             }
//                         },
//                         error: function (data) {
//                             alert(data.responseText);
//                         }
//                     });
//                 $.each(allVals, function( index, value ) {
//                     $('table tr').filter("[data-row-id='" + value + "']").remove();
//                 });
//                 }  
//             }  
//             });

//  
</script>



@endpush
    

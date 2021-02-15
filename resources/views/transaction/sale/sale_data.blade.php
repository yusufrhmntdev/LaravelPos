@extends('layouts.master')
@section('title','laravel')
@section('content')
<div class="section-body">
    <div class="row">
      <div class="col-4 col-md-4 col-lg-4">
        <div class="card">
          <div class="card-header">
            <h4>Simple Table</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
                <table width="100%"> 
                    <tr>
                        <td style="vertical-align:top;">
                            <label for="date">Date:</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="date" id="date" value="{{date('Y-m-d')}}" class="form-control">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top; width:30%">
                            <label for="date">User:</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" id="user" value="{{Auth::user()->name}}" class="form-control" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top; width:30%">
                            <label for="date">Customer:</label>
                        </td>
                        <td>
                            <div>
                               <select id="customer" class="form-control select2" name="customer_id" require>
                                 
                                   @foreach ($customer as $cst)
                                   <option value="{{$cst->id}}">{{$cst->nama_customer}}</option>
                                   @endforeach
                                                                               
                                   
                               </select>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4 col-md-4 col-lg-4">
        <div class="card">
          <div class="card-header">
            <h4>Simple Table</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
                <table width="100%"> 
                    <tr>
                        <td style="vertical-align:top; width:30%">
                            <label for="date">Barcode:</label>
                        </td>
                        <td>
                            <div class="form-group input-group">
                                <input type="hidden" id="item_id">
                                <input type="hidden" id="price">
                                <input type="hidden" id="stock">
                                <input type="text" id="barcode" class="form-control" autofocus>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn flat" data-toggle="modal" data-target="#modal-item">
                                        <i class=" fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;">
                            <label for="date">Qty:</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" id="qty" value="1" min="1" class="form-control">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <div>
                               <button type="button" id="add_cart" class="btn btn-primary col-lg-12">
                                   <i class=" fa fa-cart-plus" data-url = {{url('sale/cart')}}></i>
                                   add
                               </button>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-4 col-md-4 col-lg-4">
        <div class="card">
          <div class="card-header">
            <h4>Simple Table</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive text-right">
                <h4>invoice <b><span id="invoice">{{$kode_inv}}</span></b></h4>
                <h1><b><span id="grand_total2" style="font-size:50pt">0</span></b></h1>
            </div>
          </div>
        </div>
      </div>
      
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Cart Table</h4>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th>No.</th>
                          <th>Barcode</th>
                          <th>Product Item</th>
                          <th>Price</th>
                          <th>Qty</th>
                          <th>Discount Item</th>
                          <th>Total</th>
                          <th>User</th>
                          <th>Action</th>
                          <th ></th>
                        </tr>
                    </thead>
                    <tbody id="cart_table">
                   @include('transaction.sale.cart_data')
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4 col-md-4 col-lg-4">
          <div class="card">
            <div class="card-header">
              <h4>Simple Table</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table width="100%"> 
                    <tr>
                        <td style="vertical-align:top; width:30%">
                            <label for="date">Sub Total:</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" id="sub_total" value="0" class="form-control">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;">
                            <label for="date">Discount:</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" id="discount" value="0" min="0" class="form-control discount">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;">
                            <label for="date">Grand Total:</label>
                        </td>
                        <td>

                            <div class="form-group">
                              <input type="number" id="grand_total" class="form-control" readonly>
                            </div>
                        </td>
                    </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4 col-md-4 col-lg-4">
          <div class="card">
            <div class="card-header">
              <h4>Simple Table</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table width="100%"> 
                    <tr>
                        <td style="vertical-align:top; width:30%">
                            <label for="date">Cash:</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" id="cash" value="0" min="0" class="form-control">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top;">
                            <label for="change">Change:</label>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="number" id="change" value="0" min="0" class="form-control">
                            </div>
                        </td>
                    </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4 col-md-4 col-lg-4">
          <div class="card">
            <div class="card-header">
              <h4>Simple Table</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table width="100%"> 
                    <tr>
                        <td style="vertical-align:top;">
                            <label for="note">Note:</label>
                        </td>
                        <td>
                            <div>
                                <textarea id="note" rows="4" class="form-control"></textarea>
                            </div>
                        </td>
                    </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
       <div class="row">
            <div class="col-lg-2">
                <button id="process_payment" class="btn btn-flat btn-lg btn-success col-lg-10">
                    <i class="fa fa-paper-plane-o"></i> Success
                </button>
            </div>
            <div class="col-lg-2">
                <button id="cancel_payment" class="btn btn-flat btn-lg btn-danger col-lg-10">
                    <i class="fa fa-refresh"></i> Cancel
                </button>
            </div>
       </div>
    </div>
</div>
@push('page-script')
<script src="{{asset('assets/js/page/modules-datatables.js')}}"></script>
<script>

  $(document).on('click','#select', function(){
        $('#item_id').val($(this).data('item_id'))
         $('#barcode').val($(this).data('barcode'))
          $('#price').val($(this).data('price'))
           $('#stock').val($(this).data('stock'))
           $('#modal-item').modal('hide')
    })
  //  add cart
    $(document).on('click', '#add_cart', function(){
        var item_id= $('#item_id').val()
        var price= $('#price').val()
        var stock= $('#stock').val()
        var discount = "0"
        var qty= $('#qty').val()

        if (item_id == '') {

          swal('Info', 'item tidak ada yang di pilih', 'info');
            $('#barcode').focus()

        } else if( stock < 1){
          swal('Info', 'Stock tidak mencukupi', 'info');
            $('#item_id').val('')
            $('#barcode').val('')
            $('#barcode').focus()

        } else{
            $.ajax({
                method:'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ url('/sale/cart') }}",
                data : {'add_cart' : true, 'item_id' : item_id, 'price' :price, 'qty' :qty},
                // dataType :'json',

                success :function(response){
                  if (response.success) {
                        $('#cart_table').load('/sale/cart/data',function(){
                            calculate()
                        });
                        $('#item_id').val('')
                        $('#barcode').val('')
                        $('#qty').val(1)
                        $('#barcode').focus()
                        // location.reload()
                        swal('success', 'berhasil tambah to cart', 'success');
                       
                    } 
                    else
                    {

                      swal('error', 'gagal tambah to cart ', 'error');
                    }
                }
            })
        }
    })
    //end add cart
    //start delete cart
        $(document).on('click','#del_cart',function(){
          if(confirm('apakah anda yakin untuk menghapus data ini?')){
              var id = $(this).data('cartid')


                $.ajax({

                        type:'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{ url('/sale/delete') }}",
                        dataType:'json',
                        data:{'id' : id},
                        success: function(response){

                            if(response.success)
                            {
                              swal('success', 'data berhasil di hapus', 'success');
                              $('#cart_table').load('/sale/cart/data',function(){
                                    calculate()
                              });
                            } 
                            else
                            {
                              swal('error', 'gagal hapus ', 'error');
                            }

                        }

                })
            }
        })

  //end delete cart
  //update cart modal value
  $(document).on('click','#update_cart', function()
  {
        $('#cartid_item').val($(this).data('cartid'))
         $('#barcode_item').val($(this).data('barcode'))
         $('#product_item').val($(this).data('product'))
           $('#price_item').val($(this).data('price'))
          $('#qty_item').val($(this).data('qty'))
          $('#total_before').val($(this).data('price') * $(this).data('qty'))
          $('#discount_item').val($(this).data('discount'))
          $('#total_item').val($(this).data('total'))
  })
  //end update cart modal


  // proeses edit cart
  $(document).on('click', '#edit_cart', function(){
        var cart_id= $('#cartid_item').val()
        var price= $('#price_item').val()
        var qty= $('#qty_item').val()
        var discount= $('#discount_item').val()
        var total= $('#total_item').val()

        if (price == '' || price < 1) {

            alert('harga tidak boleh kosong')
            $('#price_item').focus()

        } else if( qty == '' || qty < 1 ){
            alert('Qty minimal 1 ')
            $('#qty_item').focus()

        } else{       
                  $.ajax({

                      type:'put',
                      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                      url: '/sale/updatecart/' + cart_id,
                      // dataType:'json',
                      data:{'id' : cart_id,'price':price,'qty':qty,'discount':discount,'total':total},
                      success: function(response){

                          if(response.success)
                          {
                            $('#cart_table').load('/sale/cart/data',function(){
                                  calculate()
                            });
                            $('#modal-item-edit').modal('hide')
                            swal('success', 'cart berhasil di update ', 'success');
                          } 
                          else
                          {
                            swal('error', 'gagal hapus ', 'error');
                          }

                    }

                   })
        }
    })
  //end
  //count edit modal
    function count_edit_modal()
    {
          var price = $('#price_item').val()
          var qty = $('#qty_item').val()
          var discount = $('#discount_item').val()

          total_before = price * qty
          $('#total_before').val(total_before)

          total = (price - discount) * qty
          $('#total_item').val(total)
          if(discount == '')
          {
            $('#discount_item').val()
          }
      }
    //count edit modal
 

    $(document).on('keyup mouseup','#price_item,#qty_item,#discount_item',function(){
        count_edit_modal()

    })

  //calculate
  function calculate() 
  {
        var subtotal = 0;
          $('#cart_table tr').each(function()
          {
            var n = $(this).find('.total').attr('totall');
            subtotal += Number(n);
          })
           isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal)

        var discount = $('#discount').val()
        var grand_total = subtotal - discount
        if(isNaN(grand_total)) 
        {
            $('#grand_total').val(0)
            $('#grand_total2').text(0)
        } else 
        {
            $('#grand_total').val(grand_total)
            $('#grand_total2').text(grand_total)
        }
        var cash = $('#cash').val();
        cash != 0 ? $('#change').val(cash - grand_total) : $('#change').val(0)
        if(discount == '') 
        {
            $('#discount').val(0)
        }
  }
$(document).on('keyup mouseup', '#discount, #cash', function() {
    calculate()
})

$(document).ready(function () {
    calculate()
})
  //end calculate
  // process payment
$(document).on('click', '#process_payment', function() {
    var customer_id = $('#customer').val()
    var subtotal = $('#sub_total').val()
    var discount = $('#discount').val()
    var grandtotal = $('#grand_total').val()
    var cash = $('#cash').val()
    var change = $('#change').val()
    var note = $('#note').val()
    var date = $('#date').val()
    var user = $('#user').val()
    if(subtotal < 1) 
    {
        alert('Belum ada product item yang dipilih')
        $('#barcode').focus()
    } else if(cash < 1) 
    {
        alert('Jumlah uang cash belum diinput')
        $('#cash').focus()
    } 
    else if(note == "")
    {
      alert('note tidak boleh kosong')
    }
    else 
    {
        if(confirm('Yakin proses transaksi ini?')) 
        {      
            $.ajax({
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '/sale/post',
                data: {
                       'customer_id': customer_id, 
                       'subtotal': subtotal, 
                        'discount': discount, 
                        'grandtotal': grandtotal,
                        'cash': cash, 
                        'change': change, 
                        'note': note, 
                        'date': date,
                        'user': user
                },
                // dataType: 'json',
                success: function(response) 
                {
                  console.log(response['success']);
                  var sale_id = response['sale_id'];
                          $('tr[name="cartData"]').each(function()
                          {
                            
                            var item_id = parseInt($(this).find('label[name="item_id"]').text());
                            var price = $(this).find('td[name="price"]').text();
                            var qty = $(this).find('td[name="qty"]').text();
                            var discount = $(this).find('td[name="discount"]').text();
                            var total = $(this).find('.total').text();
                            $.ajax({
                                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                    url: '/sale/postdetail',
                                    type: 'POST',
                                    data: {'sale_id': sale_id, 'item_id': item_id, 'price': price, 'qty': qty,'discount':discount,'total':total},
                                    // dataType: 'json',
                                    success: function (data)
                                    {
                                      if(data.success)
                                      {
                                        console.log(data['success']);
                                        swal('success', 'berhasil di simpan ', 'success');
                                      }
                                      else
                                      {
                                        alert('transaksi gagal')
                                      }
                                     
                                        location.reload();
                                    }


                                    // failure: function (data) {
                                    //    alert('failure');
                                    // },
                                    // error: function (data) {
                                    //    alert('error');
                                    // },
                            })
                        })
                }
            })
        }
    }
});

    
</script>
   



@endpush
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
            <div class="modal-body">
                <table class="table table-bordered table-striped table-responsive" id="table-1">
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
<!-- <end modal add> -->
  <!-- <modal edit> -->
    <div class="modal fade" id="modal-item-edit">
      <div class="modal-dialog modal-xs">
          <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Update Product Item</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>

              <div class="modal-body">
                  <input type="hidden" id="cartid_item">
                  <div class="form-group">
                      <label for="product_item"> Product Item</label>
                      <div class="row">
                          <div class="col-md-6">
                              <input type="text" id="barcode_item" class="form-control" readonly="">
                          </div>
                           <div class="col-md-6">
                              <input type="text" id="product_item" class="form-control" readonly="">
                          </div>
                  </div>
            </div>
                    <div class="form-group">
                         <label for="price_item"> Price</label>
                         <input type="number"  id="price_item" min="0" class="form-control" readonly="">
                    </div>

                    <div class="form-group">
                         <label for="qty_item"> Qty</label>
                         <input type="number"  id="qty_item" min="0" class="form-control">
                    </div>

                    <div class="form-group">
                         <label for="total_before"> Total Before Discount</label>
                         <input type="number"  id="total_before" min="0" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                         <label for="discount_item"> Discount Per Item</label>
                         <input type="number"  id="discount_item" min="0" class="form-control">
                    </div>
                     <div class="form-group">
                         <label for="total_item"> Total After Discount</label>
                         <input type="number"  id="total_item" min="0" class="form-control" readonly>
                    </div>
            </div>

            <div class="modal-footer">
                <div class="pull-right">
                  <button type="button" id="edit_cart" class="btn btn-flat btn-success">
                      <i class="fa fa-paper-plane"></i> Save
                  </button>
                </div>
            </div>
        </div>
    </div>
</div
@endsection




    

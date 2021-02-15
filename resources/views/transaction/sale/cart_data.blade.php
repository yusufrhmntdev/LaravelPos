
                    
                      @forelse ($cart as $no => $cart_data)
                      <tr name="cartData">
                        <td>{{++$no}}</td>
                        <td>{{$cart_data->item->barcode}}</td>
                      
                        <td>{{$cart_data->item->nama_item}}</td>
                        <td name="price">{{$cart_data->price}}</td>
                        <td name="qty">{{$cart_data->qty}}</td>
                        <td name="discount">{{$cart_data->discount}}</td>
                        <td class="total" totall="{{$cart_data->total}}">{{$cart_data->total}}</td>
                        <td class="username">{{$cart_data->user->name}}</td>
                        <td><button id="update_cart" data-toggle="modal" data-target="#modal-item-edit"
                          data-cartid="{{$cart_data->id}}"
                          data-barcode="{{$cart_data->item->barcode}}"
                          data-product="{{$cart_data->item->nama_item}}"
                          data-price="{{$cart_data->price}}"
                          data-qty="{{$cart_data->qty}}"
                          data-discount="{{$cart_data->discount}}"
                          data-total="{{$cart_data->total}}"
                          class="btn btn-info btn-sm">Update</button>
                            <button id="del_cart" data-cartid="{{$cart_data->id}}" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                        <td>
                          {{-- {{ $c->buku->kode }} --}}
              
                          <label for="b" name="item_id" style="display:none">{{ $cart_data->item_id }}</label>
                        </td>
                        </tr>
                      @empty
                      <tr>
                        <td colspan="10" class="text-center"> Tidak Ada Item</td>
                        </tr>
                      @endforelse
     
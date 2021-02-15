<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Sale;
use App\Models\Customer;

// use Barryvdh\DomPDF\PDF;
use PDF;
use App\Models\Sale_detail;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Events\QueryExecuted;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
 
        if(Auth::check())
        {
            $user = auth()->user()->id;
            $kode_inv = $this->kode_invoice();
            $customer = Customer::all();
            $item = Item::all();
            $section_header = "Sale Form";
            $cart = Cart::where('user_id', $user)->get();
        }
      
        return view('transaction.sale.sale_data',compact(['customer','item','section_header','kode_inv','cart']));
    }
    function left($str, $length)
    {
        return substr($str, 0, $length);
    }
    
    function right($str, $length){
        return substr($str, -$length);
    }

    function kode_invoice()
    {
        // Membuat Fungsi Kode dari Buku:
        $json = DB::table('sales')
                 ->select(DB::raw('RIGHT(MAX(invoice), 4) AS lastCount'))
                 ->get();
        $lastCount = json_decode($json);
        $lastCount = $lastCount[0]->lastCount;
        $lastCount += 1;
        $lastCount = $this->right('0000' . $lastCount, 4);
        $mycode = 'S.'.date('Y.m.d.') . $lastCount;
        return $mycode;
    }
    

    public function cart()
    {
        if(Auth::check())
        {
            $user = auth()->user()->id;
            $cart = Cart::where('user_id', $user)->get();
            // dd($cart);
            return view('transaction.sale.cart_data',compact('cart'));
        }
     
        // $this->load->view('transacition/sale/cart_data',$data);

    }
    function update_cart_qty(Request $request){
        // $sql = "UPDATE t_chart SET price = '$post[price]',
        //         qty = qty + '$post[qty]',
        //         total = '$post[price]' * qty
        //          WHERE item_id = '$post[item_id]'";

        $sql = DB::update('UPDATE carts SET price = '.$request->price.',
                           qty = qty + '.$request->qty.',
                           total = '.$request->price.' * qty
                           Where item_id = '.$request->item_id.'
                           ');


         return $sql;
   
    }
  
    public function storecart(Request $request)
    {   

        if(Auth::check())
        {
            $item_id = $request->input('item_id');
            // $check_cart= $this->sale_m->get_cart(['t_chart.item_id' => $item_id ]);
            $check_cart = Cart::where(['item_id' => $item_id]);
            // dd($check_cart);
            if($check_cart->count() > 0)
            {
                $this->update_cart_qty($request);
            }
            else
            {
                $user = auth()->user()->id;
                $data = Cart::create([
                    'item_id' => $request->item_id,
                    'price'=>$request->price,
                    'qty' => $request->qty,
                    'discount' => "0",
                    'total'=> $request->qty * $request->price,
                    'user_id' => $user,
                    
                    
                ]);
            }
        }
       
        return response()->json(['success'=>"Successfully added"]);
    }
    public function updatecart($id, Request $request)
    {
 
            Cart::updateOrCreate(['id' => $id], ['price' => $request->price, 'qty' => $request->qty, 'discount' => $request->discount,'total'=>$request->total]);

            return response()->json(['success'=>'Successfully updated the book.']);
    }
    public function cart_del(Request $request)
    {

		$cart_id = $request->input('id');
        $delete = Cart::where(['id' => $cart_id]);
        if ($delete->delete())
        {
            return response()->json(['success' => 'Item has been deleted']);
        }
        else
        {
            return response()->json(['error' => 'Failed to delete data']);
        }
		
		

        
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storesale(Request $request)
    {
        //

        // Sale::create($request->all);
        // Sale_detail::create($request->all);

        $create_sale = Sale::create([
            'invoice' => $this->kode_invoice(),
            'customer_id' => $request->customer_id,
            'total_price' =>$request->subtotal,
            'discount'=> $request->discount,
            'final_price'=>$request->grandtotal,
            'cash'=>$request->cash,
            'remaining'=>$request->change,
            'note'=> $request->note,
            'date'=>$request->date,
            'user_id'=>Auth::user()->id,
        ]); 
        // dd($create_sale);

       
            return response()->json(['success'=>"Successfully", 'sale_id'=>$create_sale->id]);
            // dd($create_sale);

        }

    public function store_sale_detail(Request $request)
    {
        $create_sale_detail = Sale_detail::create([

            'sale_id' => $request->sale_id,
            'item_id'=> $request->item_id,
            'price'=>$request->price,        
            'qty'=>$request->qty,
            'discount_item' => $request->discount,
            'total'=>$request->total,


        ]);
         
     $item = Item::find($request->item_id);
    //  dd($item);
     $stock = $item->stock;
     $stock -= $request->qty;
     Item::updateOrCreate(['id' => $request->item_id], ['stock' => $stock]);
     
     $user = Auth::user()->id;
     $cart = Cart::where('user_id', $user)->where('item_id', $request->item_id)->delete();
     return response()->json(['success'=>"Successfully submit"]);
    }

  


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

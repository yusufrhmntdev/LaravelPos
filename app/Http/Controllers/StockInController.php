<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Stock;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $section_header = "Stock In Data";
        $stockIn = Stock::all()->where('type','in');
        // dd($stockIn);

        return view('transaction.stock_in.stock_in_data',compact(['stockIn','section_header']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $stockIn = Stock::all();
        $section_header = " Create Stock In ";
        $item = Item::all();
        $supplier = Supplier::all();
        return view('transaction.stock_in.stock_in_create',compact(['item','supplier','section_header']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         Stock::create([
            'date'=>$request->date,
            'item_id' => $request->item_id,
            'type' => "in",
            'detail' => $request->detail,
            'qty'=>$request->qty,
            'supplier_id'=>$request->supplier_id,
            'user_id'=>Auth::user()->id
        ]);
        
        $item = Item::findOrFail($request->item_id);
        $item->stock += $request->qty;
        $item->save();
        return redirect()->route('in.index');
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
        $stock = Stock::findOrFail($id);
        $stock->delete();

        $item = Item::findOrFail($stock->item_id);
     
        $item->stock -= $stock->qty;
       
        $item->save();
      
       
        return redirect()->route('in.index');
        
       

        // return redirect()->route('in.index');
      
        
    }
    
}

<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Stock;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $section_header = " Stock Out Data ";
        $stockOut = Stock::all()->where('type','out');
        // dd($stockIn);

        return view('transaction.stock_out.stock_out_data',compact(['stockOut','section_header']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $section_header = " Create Stock Out ";
        $item = Item::all();
        $supplier = Supplier::all();
        return view('transaction.stock_out.stock_out_create',compact(['item','supplier','section_header']));
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
            'type' => "out",
            'detail' => $request->detail,
            'qty'=>$request->qty,
            'supplier_id'=>$request->supplier_id,
            'user_id'=>Auth::user()->id
        ]);
        
        $item = Item::findOrFail($request->item_id);
        $item->stock -= $request->qty;
        $item->save();
        return redirect()->route('out.index');
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
     
        $item->stock += $stock->qty;
       
        $item->save();
      
       
        return redirect()->route('out.index');
        
       

        // return redirect()->route('in.index');
      
        
    }
    public function deleteAll(Request $request,Stock $stock)
    {
        
        


        $ids = $request->ids;
        
        Stock::whereIn('id',explode(",",$ids))->delete();
        $item = Item::findOrFail($stock->item_id);
        dd($item);
        $item->stock += $stock->qty;
      
        $item->save();
        // $item = Item::findOrFail($stock->item_id);
     
        // $item->stock += $stock->qty;
      
        // return response()->json(['success'=>"Products Deleted successfully."]);
    }
}

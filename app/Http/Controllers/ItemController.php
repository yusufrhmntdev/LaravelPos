<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Item;
use App\Models\Unit;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $item = Item::all();
        $section_header = "Item Data";
        $sum = Item::sum('price');
        $item = Item::with('unit')->get();
        return view('product.item.item_data',compact(['item','sum','section_header']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $item = Item::with(['unit','category'])->first();
        $section_header = "Create Item";
        $unit= Unit::all();
        $category = Category::all();
        return view('product.item.item_create',compact(['unit','category','section_header']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Item $item)
    {
        $this->_validation($request);

        if($request->hasFile('image')== null)
        {
            $input = $request->all();

            // dd($input);
            Item::create($input);
        }
        else
        {
            $input = $request->all();
            // request()->validate([
            //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ]);
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            $input['image'] = $imageName;
            request()->image->move(public_path('assets/images/item'), $imageName);
            // dd($input);
            Item::create($input);
        }
       
        return redirect()->route('item.index')->with('message','data berhasil disimpan');
    }
    private function _validation(Request $request)
    {
        $request->validate([
            'nama_item' => ['required'],
            // 'type'=>['required'],
            'price'=>['required','numeric'],
            // 'stock' => ['required','numeric'],
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            

    ]);
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
  
 
        $section_header = "Edit Item";
        $unit= Unit::all();
        $category = Category::all();
        $item = Item::findOrFail($id);
        
        return view('product.item.item_edit',compact(['item','category','unit','section_header']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
        $this->_validation($request);

        if($request->hasFile('image'))
            {

                $image = $request->file('image'); 
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move('assets/images/item/',$imageName);
                unlink(public_path('assets/images/item/'.$item->image));
                $item->image = $imageName;
            }
            $item->nama_item =  $request->input('nama_item');
            $item->category_id = $request->input('category_id');
            $item->unit_id =  $request->input('unit_id');
            $item->price =  $request->input('price');
            // $item->stock  =  "0";
            $item->nama_item =  $request->input('nama_item');
          
            $item->save();
            return redirect()->route('item.index');
           
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

        //
        $item = Item::findOrFail($id);

        if($item->image != "")
        {
            unlink(public_path('assets/images/item/'.$item->image));
            $item->delete();
        }
        else
        {
            $item->delete();
        }
    
        return back();

    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        
        Item::whereIn('id',explode(",",$ids))->delete();
      
        return response()->json(['success'=>"Products Deleted successfully."]);
    }
    public function generate ($id)
    {
        $section_header = "QRCODE";
        $item = Item::findOrFail($id);
    
        
        $qrcode = QrCode::size(200)->generate($item->barcode);
        // dd($qrcode);
        return view('product.item.qrcode',compact(['qrcode','section_header']));
    }
}
    


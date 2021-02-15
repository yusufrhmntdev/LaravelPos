<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Psy\Command\SudoCommand;
use Illuminate\Support\Facades\Input;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $section_header = "Supplier Data";
        $supplier = Supplier::get();
        return view('master_data.supplier.supplier_data',compact(['supplier','section_header']));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          //
        $section_header = "Supplier Create";
        return view('master_data.supplier.supplier_create',compact('section_header'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->_validation($request);
        Supplier::create($request->all());

        // dd($a);

        return redirect()->route('supplier.index')->with('message','data berhasil di simpan');
    }

    private function _validation(Request $request)
    {
        $request->validate([
            'nama_supplier' => ['required'],
            // 'type'=>['required'],
            // 'address'=>['required'],
            'phone' => ['required','numeric','digits_between:10,13'],
            'email'=>['required','email'],
            

    ],
        [
            'nama_supplier.required'=>'Wajib di isi nih field', //custom error message error validate
            'email.required'=>'Wajib di isi nih field', //custom error message error validate
            'email.email'=>'Wajib email', //custom error message error validate
            'phone.required'=>'Wajib di isi nih field',
            'phone.numeric'=> 'wajib angka bos',
            'phone.digits_between'=> 'Minimal 10 digit dan Max 13 digit',
         
           
          
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
        //
        $section_header = "Supplier Edit";
        $supplier = Supplier::findOrFail($id);
      
        return view('master_data.supplier.supplier_edit',compact(['supplier','section_header']));
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
        
        // // dd($request->address);
        // Customer::where('id',$id)->update(
        //     ['nama_customer'=>$request->nama_customer,
        //      'phone'=>$request->phone,
        //      'address'=>$request->address,
        //      ]
        // );

        $this->_validation($request);
        $data = $request->all();
        $supplier = Supplier::findOrFail($id);
        $supplier->update($data);
        return redirect()->route('supplier.index')->with('message','data berhasil di update');

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
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('supplier.index');
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Supplier::whereIn('id',explode(",",$ids))->delete();
      
        return response()->json(['success'=>"Products Deleted successfully."]);
    }
}

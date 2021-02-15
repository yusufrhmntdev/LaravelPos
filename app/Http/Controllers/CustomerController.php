<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $section_header = "Customer Data";
        $customer = Customer::get();
        return view('master_data.customer.customer_data',compact(['customer','section_header']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $section_header = "Create Customer ";
        return view('master_data.customer.customer_create',compact('section_header'));
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
        Customer::create($request->all());

        return redirect()->route('customer.index')->with('message','data berhasil di simpan');

    }
    private function _validation(Request $request)
    {
        $validation = $request->validate([
            'nama_customer' => ['required'],
            'phone' => ['required','numeric','digits_between:10,13'],
    ],
        [
            'nama_customer.required'=>'Wajib di isi nih field', //custom error message error validate
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
        $section_header = "Edit Customer";
        $customer = Customer::findOrFail($id);
    
        return view('master_data.customer.customer_edit',compact(['customer','section_header']));
        
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
        $this->_validation($request);
        // dd($request->address);
        Customer::where('id',$id)->update(
            ['nama_customer'=>$request->nama_customer,
             'phone'=>$request->phone,
             'address'=>$request->address,
             ]
        );

        return redirect()->route('customer.index')->with('message','data berhasil di update');

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
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customer.index');
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $d = Customer::whereIn('id',explode(",",$ids))->delete();
      
        return response()->json(['success'=>"Products Deleted successfully."]);
    }
}
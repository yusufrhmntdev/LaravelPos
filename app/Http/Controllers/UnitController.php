<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $section_header = "Unit Data ";
        $unit = Unit::all();

        return view('master_data.unit.unit_data',compact(['unit','section_header']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $section_header = "Create Unit";
        return view('master_data.unit.unit_create',compact('section_header'));
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
        Unit::create($request->all());
        return redirect()->route('unit.index')->with('message','data berhasil disimpan');


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
        $section_header = "Edit Unit";
        $unit = Unit::findOrFail($id);
        return view('master_data.unit.unit_edit',compact(['unit','section_header']));
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
        $data = $request->all();
        $unit = Unit::findOrFail($id);
        $unit->update($data);
        return redirect()->route('unit.index')->with('message','data berhasil di update');

    }
    private function _validation(Request $request)
    {
        $request->validate([

                'nama_unit' => ['required']
        ]);
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
        $unit = Unit::findOrFail($id);
        $unit->delete();
        return redirect()->route('unit.index');
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Unit::whereIn('id',explode(",",$ids))->delete();
      
        return response()->json(['success'=>"Products Deleted successfully."]);
    }
}

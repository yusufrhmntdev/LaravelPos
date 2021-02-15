<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $section_header = "Category Data";
        $category = Category::all();

        return view('master_data.category.category_data',compact(['category','section_header']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $section_header = "Create Category";
        return view('master_data.category.category_create',compact('section_header'));
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
        Category::create($request->all());
        return redirect()->route('category.index')->with('message','data berhasil di simpan');
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
        $section_header = "Edit Category";
        $category = Category::findOrFail($id);

        return view('master_data.category.category_edit',compact(['category','section_header']));

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
        $unit = Category::findOrFail($id);
        $unit->update($data);
        return redirect()->route('category.index')->with('message','data berhasil di update');
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
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index');
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Category::whereIn('id',explode(",",$ids))->delete();
      
        return response()->json(['success'=>"Products Deleted successfully."]);
    }
}

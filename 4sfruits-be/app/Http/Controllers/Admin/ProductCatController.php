<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductCat;

class ProductCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_cats = ProductCat::paginate(7);

        return view('admin/product/cat.index', compact('product_cats'));
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
    public function store(Request $request)
    {
        // Validate form
        $request->validate(
            [
                'category' => 'required|min:2|max:50|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute phải có ít nhất :min ký tự',
                'max' => ':attribute có không quá :max ký tự',
                'regex' => ':attribute không đúng định dạng',
            ],
            [
                'category' => 'Danh mục'
            ]
        );

        // Get value input form
        $input = $request->all();

        $category = $input['category'];

        // Insert value to product_cats table
        ProductCat::create(['name' => $category]);

        // Redirect to index page
        return redirect()->route('product-cat.index')->with('success', "Thêm thành công");
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
        return view('admin/product/cat.edit', compact('id'));
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
        // Validate form
        $request->validate(
            [
                'category' => 'required|min:2|max:50|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute phải có ít nhất :min ký tự',
                'max' => ':attribute có không quá :max ký tự',
                'regex' => ':attribute không đúng định dạng',
            ],
            [
                'category' => 'Danh mục'
            ]
        );

        // Get value input form
        $input = $request->all();

        $category = $input['category'];

        // Insert value to product_cats table
        ProductCat::find($id)->update(['name' => $category]);

        // Redirect to index page
        return redirect()->route('product-cat.index')->with('update', "Cập nhập thành công");
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

    public function delete($id) {
        ProductCat::find($id)->delete();

        return redirect()->route('product-cat.index')->with('delete', "Xóa thành công");
    }
}

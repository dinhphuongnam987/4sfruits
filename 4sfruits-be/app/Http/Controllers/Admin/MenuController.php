<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Menu;
use App\MenuChilds;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();

        return view('admin/menu/menu-level1.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/menu/menu-level1.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'menu_level1' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|min:2|max: 50',
                'slug' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|min:2|max: 50',
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute có ít nhất :min kí tự',
                'max' => ':attribute có không quá :max kí tự',
                'regex' => ':attribute không đúng định dạng'
            ],
            [
                'menu_level1' => 'Menu',
            ]

        );

        // Convert to slug
        $name = trim(ucwords($request->input('menu_level1')));
        $slug = strtolower(slugify($request->input('slug')));

        // Insert database
        Menu::create([
            'name' => $name,
            'slug' => $slug
        ]);

        return redirect()->route('level1.index')->with('success', "Thêm thành công");
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
        $old_menu = Menu::find($id);
        return view('admin/menu/menu-level1.edit', [
            'id' => $id,
            'old_menu' => $old_menu
        ]);
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
        $request->validate(
            [
                'menu_level1' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|min:2|max: 50',
                'slug' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|min:2|max: 50',
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute có ít nhất :min kí tự',
                'max' => ':attribute có không quá :max kí tự',
                'regex' => ':attribute không đúng định dạng'
            ],
            [
                'menu_level1' => 'Menu',
            ]
        );

        // Convert to slug
        $name = trim(ucwords($request->input('menu_level1')));
        $slug = strtolower(slugify($request->input('slug')));

        // Insert database
        Menu::find($id)->update([
            'name' => $name,
            'slug' => $slug
        ]);

        return redirect()->route('level1.index')->with('update', "Cập nhập thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function delete($id) {
        Menu::find($id)->delete();
        MenuChilds::where('parent_id', $id)->delete();

        return redirect()->route('level1.index')->with('delete', "Xóa thành công");
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\MenuChilds;

class MenuChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_child = MenuChilds::all();

        return view('admin/menu/menu-level2.index', compact('menu_child'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_child = MenuChilds::all();
        $menus = Menu::all();


        return view('admin/menu/menu-level2.create', [
            'menu_child' => $menu_child,
            'menus' => $menus
        ]);
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
                'menu_level2' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|min:2|max: 50',
                'slug' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|min:2|max: 50',
                'menu_parent' => 'required'
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute có ít nhất :min kí tự',
                'max' => ':attribute có không quá :max kí tự',
                'regex' => ':attribute không đúng định dạng'
            ],
            [
                'menu_level2' => 'Menu',
                'menu_parent' => 'Menu cha'
            ]

        );

        // Convert to slug
        $menu_level2 = trim(ucwords($request->input('menu_level2')));
        $slug = strtolower(slugify($request->input('slug')));

        $parent_id = $request->input('menu_parent');
        // Insert database
        MenuChilds::create([
            'name' => $menu_level2,
            'slug' => $slug,
            'parent_id' => $parent_id
        ]);

        return redirect()->route('level2.index')->with('success', "Thêm thành công");
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
        $menus = Menu::all();
        $old_menu = MenuChilds::find($id);
        return view('admin/menu/menu-level2.edit', [
            'id' => $id,
            'menus' => $menus,
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
                'menu_level2' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|min:2|max: 50',
                'slug' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|min:2|max: 50',
                'menu_parent' => 'required'
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute có ít nhất :min kí tự',
                'max' => ':attribute có không quá :max kí tự',
                'regex' => ':attribute không đúng định dạng'
            ],
            [
                'menu_level2' => 'Menu',
                'menu_parent' => 'Menu cha'
            ]

        );

        // Convert to slug
        $menu_level2 = trim(ucwords($request->input('menu_level2')));
        $slug = strtolower(slugify($request->input('slug')));
        $parent_id = $request->input('menu_parent');

        // Insert database
        MenuChilds::find($id)->update([
            'name' => $menu_level2,
            'slug' => $slug,
            'parent_id' => $parent_id
        ]);

        return redirect()->route('level2.index')->with('update', "Cập nhập thành công");
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
        MenuChilds::find($id)->delete();

        return redirect()->route('level2.index')->with('delete', "Xóa thành công");
    }
}

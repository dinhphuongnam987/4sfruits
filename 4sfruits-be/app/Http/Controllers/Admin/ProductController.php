<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Product;
use App\ProductCat;
use App\ProductToCat;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(3);
        return view('admin/product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_cats = ProductCat::all();
        return view('admin/product.create', compact('product_cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation form
        validateFormProduct($request);

        // Get file
        $file = $request->file('thumbnail');
        $thumbnail_img = getFile($request, $file, 'thumbnail');

        // Get value form
        $input = $request->all();

        $name = ucfirst($input['name']);
        $slug = slugify($input['name']);
        $unit = ucfirst($input['unit']);
        $price = $input['price'];
        $description = ucfirst($input['description']);

        // Insert value and not categories to product table
        $product_created = Product::create([
            'thumbnail' => $thumbnail_img,
            'url_image' => asset('uploads/product/'.$thumbnail_img),
            'name' => $name,
            'slug' => $slug,
            'unit' => $unit,
            'price' => $price,
            'description' => $description
        ]);

        if($product_created) {
            // Upload file to server
            $file->move('uploads/product', $thumbnail_img);
        }

        // Insert value to product_to_cats with categories
        if (!empty($input['caterories'])) {
            $categories = $input['caterories'];

            $lasted_product_id = Product::latest()->first()->id;

            foreach ($categories as $cat_id) {
                ProductToCat::create([
                    'product_id' => $lasted_product_id,
                    'cat_id' => $cat_id
                ]);
            }
        }

        // Redirect to product index
        return redirect()->route('product.index')->with('success', "Thêm thành công");
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
        $product_cats = ProductCat::all();
        $old_product= Product::find($id);
        return view('admin/product.edit', [
            'product_cats' => $product_cats,
            'old_product' => $old_product,
            'id' => $id
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
        // Validation form
        validateFormProduct($request);

        // Delete old file on server
        $filename =  Product::find($id)->thumbnail;
        $image_path = public_path('uploads/product/' . $filename);

        if (File::exists($image_path)) {
            unlink($image_path);
        }

        // Get file
        $file = $request->file('thumbnail');
        $thumbnail_img = getFile($request, $file, 'thumbnail');

        // Get value form
        $input = $request->all();

        $name = ucfirst($input['name']);
        $slug = slugify($input['name']);
        $unit = ucfirst($input['unit']);
        $price = $input['price'];
        $description = ucfirst($input['description']);

        // Updates value to product table
        $product_updated = Product::find($id)->update([
            'thumbnail' => $thumbnail_img,
            'url_image' => asset('uploads/product/'.$thumbnail_img),
            'name' => $name,
            'slug' => $slug,
            'unit' => $unit,
            'price' => $price,
            'description' => $description
        ]);
        
        if($product_updated) {
            // Upload file to server
            $file->move('uploads/product', $thumbnail_img);
        }

        // Case 1 : Update value to product_to_cats with categories
        $product = Product::find($id);
        $product_id = $product->id;
        if (!empty($input['caterories'])) {
            $categories = $input['caterories'];

            // Case: Exist product and category in product_to_cats
            if (ProductToCat::where('product_id', $product_id)->first()) {
                // Delete old product and category
                ProductToCat::where('product_id', $product_id)->delete();

                // Create new product and category
                foreach ($categories as $cat_id) {
                    ProductToCat::create([
                        'product_id' => $product_id,
                        'cat_id' => $cat_id
                    ]);
                }
            } else {
                // Case not exist product and category in product_to_cats
                foreach ($categories as $cat_id) {
                    ProductToCat::create([
                        'product_id' => $product_id,
                        'cat_id' => $cat_id
                    ]);
                }
            }
        } else {
            // Case 2: Delete product in product_to_cats
            ProductToCat::where('product_id', $product_id)->delete();
        }

        return redirect()->route('product.index')->with('update', "Cập nhập thành công");
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

    public function delete($id)
    {
        // Delete file on server
        $filename =  Product::find($id)->thumbnail;
        $image_path = public_path('uploads/product/' . $filename);

        if (File::exists($image_path)) {
            unlink($image_path);
        }

        // Delete product and category in table product_to_cats
        $product_to_cat = ProductToCat::where('product_id', $id)->get();
        if (!empty($product_to_cat)) {
            ProductToCat::where('product_id', $id)->delete();
        }

        // Delete product
        Product::find($id)->delete();


        return redirect()->route('product.index')->with('delete', "Xóa thành công");
    }
}

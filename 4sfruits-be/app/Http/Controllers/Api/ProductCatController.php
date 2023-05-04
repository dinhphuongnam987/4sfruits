<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\ProductCat;

class ProductCatController extends Controller
{
    public function index($id) {

        $cats = ProductCat::all();

        if($id == 'all') {
            $products = Product::paginate(6);
        } else {
            if(ProductCat::find($id) != NULL) {;
                $products = ProductCat::find($id)->products()->paginate(6);
            } else {
                $products = [];
            }
        }
        
        try {
            return response()->json([
                'status' => true,
                'data' => [
                    'cats' => $cats,
                    'products' => $products
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => env('APP_ENV') != 'production' ? $e->getMessage() : 'Something went wrong'
            ]);
        }
    }
}

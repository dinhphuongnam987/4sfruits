<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    public function index() {
        $brand = Brand::all();
        try {
            return response()->json([
                'status' => true,
                'data' => $brand
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => env('APP_ENV') != 'production' ? $e->getMessage() : 'Something went wrong'
            ]);
        }
    }
}

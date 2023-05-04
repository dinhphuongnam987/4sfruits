<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Header;

class HeaderController extends Controller
{
    public function index() {
        $logo = Header::where('logo', 'like', '%logo.png')->first();
        try {
            return response()->json([
                'status' => true,
                'data' => $logo
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => env('APP_ENV') != 'production' ? $e->getMessage() : 'Something went wrong'
            ]);
        }
    }
}

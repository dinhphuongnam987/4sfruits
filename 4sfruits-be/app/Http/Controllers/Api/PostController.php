<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
    public function index(Request $request) {
        $limit = $request->all()['limit'];
        if(!empty($limit)) {
            $posts = Post::paginate($limit);
        }

        try {
            return response()->json([
                'status' => true,
                'data' => $posts,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => env('APP_ENV') != 'production' ? $e->getMessage() : 'Something went wrong'
            ]);
        }
    }

    public function detail(Request $request) {
        empty($request->all()['id']) ? $id = null : $id = $request->all()['id'];

        $post = Post::find($id);

        try {
            return response()->json([
                'status' => true,
                'data' => $post,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => env('APP_ENV') != 'production' ? $e->getMessage() : 'Something went wrong'
            ]);
        }
    }

    public function recent(Request $request) {
        $posts = Post::orderBy('id', 'DESC')->limit(5)->get();

        try {
            return response()->json([
                'status' => true,
                'data' => $posts,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => env('APP_ENV') != 'production' ? $e->getMessage() : 'Something went wrong'
            ]);
        }
    }
}

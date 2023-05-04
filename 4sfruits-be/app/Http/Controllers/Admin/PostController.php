<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\User;
use App\Post;
use App\PostToUser;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::paginate(3);
        return view('admin/post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin/post.create', compact('users'));
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
        validateFormPost($request);

        // Get file
        $file = $request->file('thumbnail');
        $thumbnail_img = getFile($request, $file, 'thumbnail');

        // Get value form
        $input = $request->all();

        $title = ucfirst($input['title']);
        $slug = slugify($input['title']);
        $user = ucfirst(User::find($input['user'])->name);
        $description = ucfirst($input['description']);

        // Insert value to table posts
        $post_created = Post::create([
            'thumbnail' => $thumbnail_img,
            'url_image' => asset('uploads/post/'.$thumbnail_img),
            'title' => $title,
            'slug' => $slug,
            'user' => $user,
            'description' => $description
        ]);

        // Insert value to table post_to_users
        $lasted_post_id = Post::latest()->first()->id;
        PostToUser::create([
            'post_id' => $lasted_post_id,
            'user_id' => $input['user']
        ]);

        if($post_created) {
            // Upload file to server
            $file->move('uploads/post', $thumbnail_img);
        }

        // Redirect to post index
        return redirect()->route('post.index')->with('success', "Thêm thành công");
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
        $old_post = Post::find($id);
        $users = User::all();
        return view('admin/post.edit', [
            'users' => $users,
            'old_post' => $old_post,
            'id' => $id,
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
        validateFormPost($request);

        // Delete old file on server
        $filename =  Post::find($id)->thumbnail;
        $image_path = public_path('uploads/post/' . $filename);

        if (File::exists($image_path)) {
            unlink($image_path);
        }

        // Get file
        $file = $request->file('thumbnail');
        $thumbnail_img = getFile($request, $file, 'thumbnail');

        // Get value form
        $input = $request->all();

        $title = ucfirst($input['title']);
        $slug = slugify($input['title']);
        $user = ucfirst(User::find($input['user'])->name);
        $description = ucfirst($input['description']);

        // Updates value to post table
        $post_updated = Post::find($id)->update([
            'thumbnail' => $thumbnail_img,
            'url_image' => asset('uploads/post/'.$thumbnail_img),
            'title' => $title,
            'slug' => $slug,
            'user' => $user,
            'description' => $description
        ]);

        // Updates value to post_to_users table
        PostToUser::where('post_id', $id)->update([
            'user_id' => $input['user']
        ]);
        
        if($post_updated) {
            // Upload file to server
            $file->move('uploads/post', $thumbnail_img);
        }

        return redirect()->route('post.index')->with('update', "Cập nhập thành công");
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
        $filename =  Post::find($id)->thumbnail;
        $image_path = public_path('uploads/post/' . $filename);

        if (File::exists($image_path)) {
            unlink($image_path);
        }

        // Delete post and user in table Post_to_cats
        $post_to_user = PostToUser::where('post_id', $id)->get();
        if (!empty($post_to_user)) {
            PostToUser::where('post_id', $id)->delete();
        }

        // Delete Post
        Post::find($id)->delete();

        return redirect()->route('post.index')->with('delete', "Xóa thành công");
    }
}

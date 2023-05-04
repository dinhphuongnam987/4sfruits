<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
</head>

<body>
    @extends('layout.master')

    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-6 mt-3 ml-2 position-relative">
                    <h1>Thêm bài viết</h1>

                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Tiêu đề bài viết">
                            <small class="form-text text-muted">
                                @error('title')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </small>
                        </div>

                        <div class="form-group">
                            <div class="form-floating">
                                <textarea class="form-control" name="description" placeholder="Mô tả" id="floatingTextarea2" style="height: 100px"></textarea>
                            </div>
                            <small class="form-text text-muted">
                                @error('description')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </small>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Người viết bài</label>
                            @if(!empty($users))
                                <select class="form-control" name="user" id="exampleFormControlSelect1">
                                    @foreach($users as $user)
                                        <option value="{{ $user['id'] }}">{{ Str::upper($user['name']) }}</option>
                                    @endforeach
                                </select>
                            @endif
                            <small id="emailHelp" class="form-text text-muted">
                                @error('user')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </small>
                        </div>

                        <div class="form-group">
                            <label for="thumbnail">Thêm ảnh</label>
                            <input type="file" name="thumbnail" id="thumbnail" accept="image/*" class="form-control-file">
                            <small class="form-text text-muted">
                                @error('thumbnail')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </small>
                        </div>                          


                        <button type="submit" class="btn btn-primary float-right" name="btn_add_post" value="Add post">Thêm bài viết</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
    
</body>

</html>

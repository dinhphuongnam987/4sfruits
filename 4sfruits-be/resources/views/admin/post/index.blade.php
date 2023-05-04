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
        <div class="container mt-3">
            <h1>Danh sách bài viết</h1>

            @if (Session::has('success'))
                <div class="alert alert-success d-flex justify-content-center align-items-center">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif

            @if (Session::has('delete'))
                <div class="alert alert-danger d-flex justify-content-center align-items-center">
                    <p>{{ Session::get('delete') }}</p>
                </div>
            @endif

            @if (Session::has('update'))
                <div class="alert alert-info d-flex justify-content-center align-items-center">
                    <p>{{ Session::get('update') }}</p>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    @if (!empty($posts))
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Ảnh bài viết</th>
                                <th scope="col">Tiêu đề bài viết</th>
                                <th scope="col">Tên người viết</th>
                                <th scope="col">Mô tả bài viết</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td><img src="{{ $post['url_image'] }}" style="width: 100px; height: 100px;"></td>
                                        <td> {{ $post['title'] }}</td>
                                        <td> {{ $post['user'] }}</td>
                                        <td style="width: 450px"> {{ $post['description'] }}</td>
                                        <td>
                                            <a href="{{ route('post.edit', $post['id']) }}">
                                                <i class="fas fa-edit" style="color: rgb(255, 0, 43)"></i>
                                            </a>
                                            <a href="{{ route('post.delete', $post['id']) }}">
                                                <i class="far fa-trash-alt" style="color: rgb(255, 0, 43)"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $posts->links() }}
                    @endif
                </div>
            </div>
        </div>
    @endsection
</body>

</html>

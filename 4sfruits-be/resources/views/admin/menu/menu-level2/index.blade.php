<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu Level 2</title>
</head>

<body>
    @extends('layout.master')

    @section('content')
        <div class="container mt-3">
            <h1>Menu cấp 2</h1>

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
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Tên</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Sửa</th>
                                <th scope="col">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menu_child as $menu)
                                <tr>
                                    <td>{{ ucfirst($menu['name']) }}</td>
                                    <td>{{ ($menu['slug']) }}</td>
                                    <td>
                                        <a href="{{ route('level2.edit', $menu['id']) }}">
                                            <i class="fas fa-edit" style="color: rgb(255, 251, 0)"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('level2.delete', $menu['id']) }}">
                                            <i class="far fa-trash-alt" style="color: rgb(255, 251, 0)"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
</body>

</html>

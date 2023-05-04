<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Category</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Product Cat</title>
    </head>

    <body>
        @extends('layout.master')

        @section('content')
            <div class="container mt-3">
                <h1>Danh sách danh mục</h1>

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
                        @if (!empty($product_cats))
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Tên danh mục</th>
                                        <th scope="col">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product_cats as $cat)
                                        <tr>
                                            <td> {{ $cat['name'] }}</td>
                                            <td>
                                                <a href="{{ route('product-cat.edit', $cat['id']) }}">
                                                    <i class="fas fa-edit" style="color: rgb(255, 0, 43)"></i>
                                                </a>
                                                <a href="{{ route('product-cat.delete', $cat['id']) }}">
                                                    <i class="far fa-trash-alt" style="color: rgb(255, 0, 43)"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-5 mt-3">
                        <form action="{{ route('product-cat.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Thêm mới danh mục</label>
                                <input type="text" name="category" class="form-control" placeholder="Tên danh mục">
                                <small class="form-text text-muted">
                                    @error('category')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </small>
                            </div>
                            <button type="submit" name="btn_add_category" value="Add category" class="btn btn-primary">Thêm</button>
                        </form>

                        <div class="mt-4">
                            {{ $product_cats->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    </body>

    </html>

</body>

</html>

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
            <h1>Sửa danh mục</h1>
            <div class="row">
                <div class="col-5">
                    <form action="{{ route('product-cat.update', $id) }}" method="post">
                        @csrf
                        @METHOD('PUT')
                        <div class="form-group">
                            <input type="text" name="category" class="form-control" placeholder="Tên danh mục">
                            <small class="form-text text-muted">
                                @error('category')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </small>
                        </div>
                        <button type="submit" name="btn_update_category" value="Update category" class="btn btn-primary">Cập nhập</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
</body>

</html>

</body>

</html>

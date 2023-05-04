<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
</head>

<body>
    @extends('layout.master')

    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-6 mt-3 ml-2 position-relative">
                    <h1>Thêm mới sản phẩm</h1>

                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm">
                            <small class="form-text text-muted">
                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </small>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="unit" placeholder="Tên đơn vị">
                            <small class="form-text text-muted">
                                @error('unit')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </small>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="price" placeholder="Giá">
                            <small class="form-text text-muted">
                                @error('price')
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
                            <label for="thumbnail">Thêm ảnh</label>
                            <input type="file" name="thumbnail" id="thumbnail" accept="image/*" class="form-control-file">
                            <small class="form-text text-muted">
                                @error('thumbnail')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </small>
                        </div>                          

                        @if (!empty($product_cats))
                            <h6>Danh mục</h6>
                            @foreach ($product_cats as $cat)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="caterories['{{ $cat['id'] }}']"
                                        value=" {{ $cat['id'] }}" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ Str::upper($cat['name']) }}
                                    </label>
                                </div>
                            @endforeach
                            @error('caterories')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        @endif
                        <button type="submit" class="btn btn-primary float-right" name="btn_add_product" value="Add product">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
    
</body>

</html>

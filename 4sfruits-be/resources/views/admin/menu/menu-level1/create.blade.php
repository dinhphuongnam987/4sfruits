<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu Level 1</title>
</head>
<body>
    @extends('layout.master')

    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-8 mt-3 ml-2">
                    <form action="{{ route('level1.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="">Menu cấp 1</label>
                          <input type="text" class="form-control" name="menu_level1" id="" aria-describedby="emailHelp">
                          <small id="emailHelp" class="form-text text-muted">
                            @error('menu_level1')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                          </small>

                          <label for="">Slug</label>
                          <input type="text" class="form-control" name="slug" id="" aria-describedby="emailHelp">
                          <small id="emailHelp" class="form-text text-muted">
                            @error('slug')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                          </small>
                        </div>
                        <button type="submit" class="btn btn-primary" name="btn_add_menu" value="Add menu">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
</body>
</html>
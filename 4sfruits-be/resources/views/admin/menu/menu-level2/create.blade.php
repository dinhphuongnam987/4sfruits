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
        <div class="container">
            <div class="row">
                <div class="col-8 mt-3 ml-2">
                    <form action="{{ route('level2.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label>Menu cấp 2</label>
                          <input type="text" class="form-control" name="menu_level2" aria-describedby="emailHelp">
                          <small id="emailHelp" class="form-text text-muted">
                            @error('menu_level2')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                          </small>

                          <label>Slug</label>
                          <input type="text" class="form-control" name="slug" aria-describedby="emailHelp">
                          <small id="emailHelp" class="form-text text-muted">
                            @error('slug')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                          </small>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Menu cha</label>
                            <select class="form-control" name="menu_parent" id="exampleFormControlSelect1">
                                @foreach($menus as $menu)
                                    <option value="{{ $menu['id'] }}">{{ Str::upper($menu['name']) }}</option>
                                @endforeach
                            </select>
                            <small id="emailHelp" class="form-text text-muted">
                                @error('menu_parent')
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
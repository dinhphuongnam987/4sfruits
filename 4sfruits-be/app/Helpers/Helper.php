<?php
// Slugify a string
    if (!function_exists('slugify')) {
        function slugify($text)
        {
            // Strip html tags
            $text=strip_tags($text);
            // Replace non letter or digits by -
            $text = preg_replace('~[^\pL\d]+~u', '-', $text);
            // Transliterate
            setlocale(LC_ALL, 'en_US.utf8');
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
            // Remove unwanted characters
            $text = preg_replace('~[^-\w]+~', '', $text);
            // Trim
            $text = trim($text, '-');
            // Remove duplicate -
            $text = preg_replace('~-+~', '-', $text);
            // Lowercase
            $text = strtolower($text);
            // Check if it is empty
            if (empty($text)) { return 'n-a'; }
            // Return result
            return $text;
        }
    }

    if(!function_exists('validateFormProduct')) {
        function validateFormProduct($request) {
            $request->validate(
                [
                    'thumbnail' => 'required',
                    'name' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|min:2|max: 25',
                    'unit' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|max: 2',
                    'price' => 'required|integer',
                    'description' => 'required|max: 255',
                ],
                [
                    'required' => ':attribute không được để trống',
                    'min' => ':attribute có ít nhất :min kí tự',
                    'max' => ':attribute có không quá :max kí tự',
                    'regex' => ':attribute không đúng định dạng',
                    'integer' => ':attribute phải là kiểu số'
                ],
                [
                    'thumbnail' => 'Ảnh sản phẩm',
                    'name' => 'Tên sản phẩm',
                    'unit' => 'Tên đơn vị',
                    'price' => 'Giá sản phẩm',
                    'description' => 'Mô tả sản phẩm',
                ]
            );
        }
    }

    if(!function_exists('validateFormPost')) {
        function validateFormPost($request) {
            $request->validate(
                [
                    'thumbnail' => 'required',
                    'title' => 'required|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/|min:5|max: 255',
                    'description' => 'required|max: 3000',
                ],
                [
                    'required' => ':attribute không được để trống',
                    'min' => ':attribute có ít nhất :min kí tự',
                    'max' => ':attribute có không quá :max kí tự',
                    'regex' => ':attribute không đúng định dạng',
                    'integer' => ':attribute phải là kiểu số'
                ],
                [
                    'thumbnail' => 'Ảnh bài viết',
                    'title' => 'Tiêu đề bài viết',
                    'description' => 'Mô tả bài viết',
                ]
            );
        }
    }

    if(!function_exists('getFile')) {
        function getFile($request, $file, $field) {
            if ($request->hasFile($field)) {
                
                // Get file name with (.jpg, .png, .gif, ...)
                $thumbnail = $file->getClientOriginalName();
    
                // Only get file name no contains (.jpg, .png, .gif, ...)
                $thumbnail_name = pathinfo($thumbnail, PATHINFO_FILENAME);
    
                // Get file format (.jpg, .png, .gif, ...)
                $extension = pathinfo($thumbnail, PATHINFO_EXTENSION);
    
                // Result = file name + time + file format
                $thumbnail_img = $thumbnail_name .time(). '.'.$extension;

                return $thumbnail_img;
            }
        }
    }

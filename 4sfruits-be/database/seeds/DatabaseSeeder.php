<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Marry Doe',
                'email' => 'marry@gmail.com',
                'password' => '731998nam'
            ],
            [
                'name' => 'Simon Joe',
                'email' => 'simon@gmail.com',
                'password' => '731998nam'
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '731998nam'
            ],
        ]);

        DB::table('headers')->insert([
            ['logo' => asset('uploads/logo.png')],
        ]);

        DB::table('brands')->insert([
            ['url_logo' => asset('uploads/brand/1.png')],
            ['url_logo' => asset('uploads/brand/2.png')],
            ['url_logo' => asset('uploads/brand/3.png')],
            ['url_logo' => asset('uploads/brand/4.png')],
            ['url_logo' => asset('uploads/brand/5.png')],
        ]);

        DB::table('menus')->insert([
            [
                'name' => 'Home',
                'slug' => 'index'
            ],
            [
                'name' => 'About',
                'slug' => 'about'
            ],
            [
                'name' => 'News',
                'slug' => 'news'
            ],
            [
                'name' => 'Contact',
                'slug' => 'contact'
            ],
            [
                'name' => 'Shop',
                'slug' => 'shop'
            ],
        ]);

        DB::table('menu_childs')->insert([
            ['name' => 'Check Out', 'slug' => 'check-out', 'parent_id' => 5],
            ['name' => 'Cart', 'slug' => 'cart', 'parent_id' => 5]
        ]);

        DB::table('product_cats')->insert([
            ['name' => 'Apples and pears'],
            ['name' => 'Berries'],
            ['name' => 'Melons']
        ]);

        DB::table('products')->insert([
            [
                'thumbnail' => 'product-img-1.jpg',
                'url_image' => asset('uploads/product/product-img-1.jpg'),
                'name' => 'Strawberry',
                'slug' => 'strawberry',
                'unit' => 'Kg',
                'price' => 85,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta sint dignissimos, rem commodi cum voluptatem quae reprehenderit repudiandae ea tempora incidunt ipsa, quisquam animi perferendis eos eum modi! Tempora, earum'
            ],
            [
                'thumbnail' => 'product-img-2.jpg',
                'url_image' => asset('uploads/product/product-img-2.jpg'),
                'name' => 'Berry',
                'slug' => 'berry',
                'unit' => 'Kg',
                'price' => 70,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta sint dignissimos, rem commodi cum voluptatem quae reprehenderit repudiandae ea tempora incidunt ipsa, quisquam animi perferendis eos eum modi! Tempora, earum'
            ],
            [
                'thumbnail' => 'product-img-3.jpg',
                'url_image' => asset('uploads/product/product-img-3.jpg'),
                'name' => 'Lemon',
                'slug' => 'lemon',
                'unit' => 'Kg',
                'price' => 35,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta sint dignissimos, rem commodi cum voluptatem quae reprehenderit repudiandae ea tempora incidunt ipsa, quisquam animi perferendis eos eum modi! Tempora, earum'
            ],
            [
                'thumbnail' => 'product-img-4.jpg',
                'url_image' => asset('uploads/product/product-img-4.jpg'),
                'name' => 'Avocado',
                'slug' => 'avocado',
                'unit' => 'Kg',
                'price' => 50,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta sint dignissimos, rem commodi cum voluptatem quae reprehenderit repudiandae ea tempora incidunt ipsa, quisquam animi perferendis eos eum modi! Tempora, earum'
            ],
            [
                'thumbnail' => 'product-img-5.jpg',
                'url_image' => asset('uploads/product/product-img-5.jpg'),
                'name' => 'Green Apple',
                'slug' => 'green-apple',
                'unit' => 'Kg',
                'price' => 45,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta sint dignissimos, rem commodi cum voluptatem quae reprehenderit repudiandae ea tempora incidunt ipsa, quisquam animi perferendis eos eum modi! Tempora, earum'
            ],
            [
                'thumbnail' => 'product-img-6.jpg',
                'url_image' => asset('uploads/product/product-img-6.jpg'),
                'name' => 'Raspberry',
                'slug' => 'raspberry',
                'unit' => 'Kg',
                'price' => 45,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta sint dignissimos, rem commodi cum voluptatem quae reprehenderit repudiandae ea tempora incidunt ipsa, quisquam animi perferendis eos eum modi! Tempora, earum'
            ],
            [
                'thumbnail' => 'product-img-4.jpg',
                'url_image' => asset('uploads/product/product-img-4.jpg'),
                'name' => 'Avocado',
                'slug' => 'avocado',
                'unit' => 'Kg',
                'price' => 50,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta sint dignissimos, rem commodi cum voluptatem quae reprehenderit repudiandae ea tempora incidunt ipsa, quisquam animi perferendis eos eum modi! Tempora, earum'
            ],
            [
                'thumbnail' => 'product-img-3.jpg',
                'url_image' => asset('uploads/product/product-img-3.jpg'),
                'name' => 'Lemon',
                'slug' => 'lemon',
                'unit' => 'Kg',
                'price' => 35,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta sint dignissimos, rem commodi cum voluptatem quae reprehenderit repudiandae ea tempora incidunt ipsa, quisquam animi perferendis eos eum modi! Tempora, earum'
            ],
            [
                'thumbnail' => 'product-img-1.jpg',
                'url_image' => asset('uploads/product/product-img-1.jpg'),
                'name' => 'Strawberry',
                'slug' => 'strawberry',
                'unit' => 'Kg',
                'price' => 85,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta sint dignissimos, rem commodi cum voluptatem quae reprehenderit repudiandae ea tempora incidunt ipsa, quisquam animi perferendis eos eum modi! Tempora, earum'
            ],
            [
                'thumbnail' => 'product-img-2.jpg',
                'url_image' => asset('uploads/product/product-img-2.jpg'),
                'name' => 'Berry',
                'slug' => 'berry',
                'unit' => 'Kg',
                'price' => 70,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta sint dignissimos, rem commodi cum voluptatem quae reprehenderit repudiandae ea tempora incidunt ipsa, quisquam animi perferendis eos eum modi! Tempora, earum'
            ]
        ]);

        DB::table('product_to_cats')->insert([
            [
                'product_id' => 1,
                'cat_id' => 2
            ],
            [
                'product_id' => 2,
                'cat_id' => 2
            ],
            [
                'product_id' => 3,
                'cat_id' => 3
            ],
            [
                'product_id' => 4,
                'cat_id' => 2
            ],
            [
                'product_id' => 5,
                'cat_id' => 1
            ],
            [
                'product_id' => 6,
                'cat_id' => 2
            ],
            [
                'product_id' => 7,
                'cat_id' => 2
            ],
            [
                'product_id' => 8,
                'cat_id' => 3
            ],
            [
                'product_id' => 9,
                'cat_id' => 2
            ],
            [
                'product_id' => 10,
                'cat_id' => 2
            ],
        ]);
    }
}

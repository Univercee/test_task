<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'id' => 1,
                'name' => 'First',
                'description' => 'This is the first test product',
                'price' => 10,
                'main_image' => 'aaa',
                'images' => '{"0":"aaa", "1":"bbb"}'
            ],
            [
                'id' => 2,
                'name' => 'Second',
                'description' => 'This is the second test product',
                'price' => 3,
                'main_image' => 'aaa',
                'images' => '{"0":"aaa", "1":"bbb"}'
            ]
        ]);
    }
}

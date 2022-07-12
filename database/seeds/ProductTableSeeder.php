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
                'name' => '1st',
                'description' => 'This is the 1st product',
                'price' => 10,
                'main_image' => './storage/default-product.jpg',
                'images' => '["image_1.1", "image_1.2"]'
            ],
            [
                'id' => 2,
                'name' => '2nd',
                'description' => 'This is the 2nd product',
                'price' => 3,
                'main_image' => './storage/default-product.jpg',
                'images' => '["image_2.1", "image_2.2"]'
            ],
            [
                'id' => 3,
                'name' => '3rd',
                'description' => 'This is the 3rd product',
                'price' => 85,
                'main_image' => './storage/default-product.jpg',
                'images' => '["image_3.1", "image_3.2"]'
            ],
            [
                'id' => 4,
                'name' => '4th',
                'description' => 'This is the 4th product',
                'price' => 17,
                'main_image' => './storage/default-product.jpg',
                'images' => '["image_4.1", "image_4.2"]'
            ],
            [
                'id' => 5,
                'name' => '5th',
                'description' => 'This is the 5th product',
                'price' => 37,
                'main_image' => './storage/default-product.jpg',
                'images' => '["image_5.1", "image_5.2"]'
            ],
            [
                'id' => 6,
                'name' => '6th',
                'description' => 'This is the 6th product',
                'price' => 5,
                'main_image' => './storage/default-product.jpg',
                'images' => '["image_6.1", "image_6.2"]'
            ],
            [
                'id' => 7,
                'name' => '7th',
                'description' => 'This is the 7th product',
                'price' => 243,
                'main_image' => './storage/default-product.jpg',
                'images' => '["image_7.1", "image_7.2"]'
            ],
            [
                'id' => 8,
                'name' => '8th',
                'description' => 'This is the 8th product',
                'price' => 111,
                'main_image' => './storage/default-product.jpg',
                'images' => '["image_8.1", "image_8.2"]'
            ],
            [
                'id' => 9,
                'name' => '9th',
                'description' => 'This is the 9th product',
                'price' => 10,
                'main_image' => './storage/default-product.jpg',
                'images' => '["image_9.1", "image_9.2"]'
            ],
            [
                'id' => 10,
                'name' => '10th',
                'description' => 'This is the 10th product',
                'price' => 12,
                'main_image' => './storage/default-product.jpg',
                'images' => '["image_10.1", "image_10.2"]'
            ],
            [
                'id' => 11,
                'name' => '11th',
                'description' => 'This is the 11th product',
                'price' => 34,
                'main_image' => './storage/default-product.jpg',
                'images' => '["image_11.1", "image_11.2"]'
            ],
            [
                'id' => 12,
                'name' => '12th',
                'description' => 'This is the 12th product',
                'price' => 163,
                'main_image' => './storage/default-product.jpg',
                'images' => '["image_12.1", "image_12.2"]'
            ],
            [
                'id' => 13,
                'name' => '13th',
                'description' => 'This is the 13th product',
                'price' => 66,
                'main_image' => './storage/default-product.jpg',
                'images' => '["image_13.1", "image_13.2"]'
            ],
            [
                'id' => 14,
                'name' => '14th',
                'description' => 'This is the 14th product',
                'price' => 11,
                'main_image' => './storage/default-product.jpg',
                'images' => '["image_14.1", "image_14.2"]'
            ],
            [
                'id' => 15,
                'name' => '15th',
                'description' => 'This is the 15th product',
                'price' => 24,
                'main_image' => './storage/default-product.jpg',
                'images' => '["image_15.1", "image_15.2"]'
            ],
            [
                'id' => 16,
                'name' => '16th',
                'description' => 'This is the 16th product',
                'price' => 45,
                'main_image' => './storage/default-product.jpg',
                'images' => '["image_16.1", "image_16.2"]'
            ]
        ]);
    }
}
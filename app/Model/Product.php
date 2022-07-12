<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Product extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'price', 'images'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];

    //
    public static function get($id, $fields = []){
        $columns = ['id', 'name', 'price', 'main_image', 'created_at'];
        foreach($fields as $field){
            if (Schema::hasColumn('products', $field) && !in_array($columns, $field, true)){
                array_push($columns, $field);
            }
        }
        $data = Product::select($columns)->where('id', $id)->get();
        return $data;
    }

    //
    public static function getAll(){
        $columns = ['id', 'name', 'price', 'main_image', 'created_at'];
        $data = Product::select($columns)->get();
        return $data;
    }

    //
    public static function create(string $name, string $description, float $price, string $main_image, array $images){
        if(self::validate_product_data($name, $description, $price, $main_image, $images)){
            $id = Product::insertGetId([
                "name" => $name,
                "description" => $description,
                "price" => $price,
                "main_image" => $main_image,
                "images" => json_encode($images)
            ]);
        }
        else{
            $id = -1;
        }
        return $id;
    }

    //
    private static function validate_product_data(string $name, string $description, float $price, string $main_image, array $images){
        $is_valid = true;
        if(strlen($name) > 200 || strlen($name) == 0){
            $is_valid = false;
        }
        if(strlen($description) > 1000){
            $is_valid = false;
        }
        if($price < 0){
            $is_valid = false;
        }
        if(count($images) > 2){
            $is_valid = false;
        }
        return $is_valid;
    }
}

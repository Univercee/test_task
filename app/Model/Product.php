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
            if (Schema::hasColumn('products', $field) && !in_array($field, $columns, true)){
                array_push($columns, $field);
            }
        }
        $data = Product::select($columns)->where('id', $id)->first();
        if($data){
            $data['images'] = json_decode($data['images']);
        }
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
        $id = Product::insertGetId([
            "name" => $name,
            "description" => $description,
            "price" => $price,
            "main_image" => $main_image,
            "images" => json_encode($images)
        ]);
        return $id;
    }
}

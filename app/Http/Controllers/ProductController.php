<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{   
    //
    public function get(int $id)
    {
        $product = Product::get($id, ['images', 'description']);
        return response()->json($product, 200);
    }

    //
    public function getAll()
    {   
        $all_products = Product::getAll();
        return response()->json($all_products, 200);
    }

    //
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:200',
            'description' => 'required|max:1000',
            'price' => 'required|numeric|min:0',
            'main_image' => 'required|max:255',
            'images' => 'required|array|max:2',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }
        else{
            $id = Product::create(
                $request->input('name'), 
                $request->input('description'), 
                $request->input('price'), 
                $request->input('main_image'),
                $request->input('images')
            );
            return response()->json($id, 200);
        }
    }
}

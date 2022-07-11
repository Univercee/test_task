<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{   
    //
    public function get(int $id)
    {
        $product = Product::get($id);
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
        $id = Product::create(
            $request->input('name')??'', 
            $request->input('description')??'', 
            $request->input('price')??-1, 
            $request->input('main_image')??'',
            $request->input('images')??'[]'
        );
        $code = $id==-1 ? 422 : 200;
        return response()->json($id, $code);
    }
}

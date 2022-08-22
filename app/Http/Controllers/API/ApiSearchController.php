<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ApiSearchController extends Controller
{
    public function filter($name)
    {
        try {
            $data = Product::where('name', 'LIKE', '%' . $name . '%')->get();
            
            if (count($data)) {
                $foo = array();

            // for merging category table into duty table and getting boat from duty table
            // nested relation table data
                foreach ($data as $product) {
                    $foo = [
                        'product_images' => $product->product_images,
                        'pickup_address' => $product->pickup_address,
                    ];
                }
                return response()->json(['status' => 'true', 'message' => 'Search Results !', 'data' => $data]);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 'false', 'message' => $e->getMessage()]);
        }
    }
}

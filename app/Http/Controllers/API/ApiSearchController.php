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
                return response()->json(['status' => 'true', 'message' => 'Search Results !', 'data' => $data]);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 'false', 'message' => $e->getMessage()]);
        }
    }
}

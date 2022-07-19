<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ApiGetController extends Controller
{
    public function renter()
    {
        try {
            $renter = User::where('role','renter')->all();
            return response()->json(['end_user' => $renter, 'status' => 'true']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'end_user' => [], 'status' => 'false']);
        }
    }

    public function service()
    {
        try {
            $service = User::where('role','service')->all();
            return response()->json(['service_provider' => $service, 'status' => 'true']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'service_provider' => [], 'status' => 'false']);
        }
    }
}

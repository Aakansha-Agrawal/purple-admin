<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\PickupAddress;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $cart = Cart::where('user_email', Auth::user()->email)->get();
            $foo = [];

            foreach ($cart as $data) {
                $foo = [
                    'product' => $data->product,
                ];
            }

            return response()->json(['message' => "Product Fetched Successfully", 'status' => 'true', 'cart' => $cart]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 'false', 'cart' => []]);
        }
    }

    public function store(Request $request)
    {
        try {
            $cart = new Cart();
            $cart->user_email = Auth::user()->email;
            $cart->product_id = $request->input('product_id');
            $cart->quantity = $request->input('quantity');
            $cart->rent = $request->input('rent');
            $cart->start_date = $request->input('start_date');
            $cart->end_date = $request->input('end_date');
            $cart->rent_price = $request->input('rent_price');
            $cart->package = $request->input('package');
            $cart->package_price = $request->input('package_price');
            $cart->total_amount = $request->input('total_amount');
            $cart->delivery = $request->input('delivery');
            $cart->save();

            if ($request->input('delivery') == "delivery" || $request->input('delivery') == "shipping") {
                // for saving address in address table
                // code for address on another table
                $pickup_address = new PickupAddress();
                $pickup_address->address = $request->input('address');
                $pickup_address->landmark = $request->input('landmark');
                $pickup_address->country = $request->input('country');
                $pickup_address->state = $request->input('state');
                $pickup_address->city = $request->input('city');
                $pickup_address->postal_code = $request->input('postal_code');
                $pickup_address->booking_id = $cart->id;
                $pickup_address->save();

                return response()->json(['message' => "Product Added to Cart Successfully", 'status' => 'true', 'cart' => $cart, 'address' => $pickup_address]);
            } else
                return response()->json(['message' => "Product Added to Cart Successfully", 'status' => 'true', 'cart' => $cart]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 'false', 'cart' => []]);
        }
    }

    public function destroy($id)
    {
        try {
            $cart = Cart::find($id);

            if ($cart) {
                $cart->destroy($id);
                return response()->json(['message' => "Product Deleted Successfully", 'status' => 'true']);
            } else
                return response()->json(['message' => "Product Not Found!", 'status' => 'false', 'cart' => []]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 'false', 'cart' => []]);
        }
    }

    public function destroy_data()
    {
        try {
            $cart = Cart::where('email', Auth::user()->email)->get();

            foreach ($cart as $item) {
                $item->destroy($item->id);
            }
            return response()->json(['message' => "Product Deleted Successfully", 'status' => 'true']);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 'false', 'cart' => []]);
        }
    }
}

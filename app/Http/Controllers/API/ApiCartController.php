<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
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
        try{
            $cart = Cart::where('user_email', Auth::user()->email)->get();
            $foo = [];
            
            foreach($cart as $data){
                $foo = [
                    'product' => $data->product,
                ];
            }
            
            return response()->json(['message'=>"Product Fetched Successfully", 'status'=>'true', 'cart'=>$cart ]);
        }
        catch(Exception $e){
            return response()->json(['message'=>$e->getMessage(), 'status'=>'false', 'cart'=>[] ]);
        }
    }

    public function store(Request $request)
    {
        try{
            $cart = new Cart();
            $cart->user_email = Auth::user()->email;
            $cart->product_id = $request->input('product_id');
            $cart->quantity = $request->input('quantity');
            $cart->rent = $request->input('rent');
            $cart->rent_price = $request->input('rent_price');
            $cart->package = $request->input('package');
            $cart->package_price = $request->input('package_price');
            $cart->delivery = $request->input('delivery');
            $cart->save();
            
            return response()->json(['message'=>"Product Added to Cart Successfully", 'status'=>'true', 'cart'=>$cart ]);
        }
        catch(Exception $e){
            return response()->json(['message'=>$e->getMessage(), 'status'=>'false', 'cart'=>[] ]);
        }
    }

    public function destroy($id)
    {
        try{
            $cart = Cart::find($id);
            $cart->destroy();
            
            return response()->json(['message'=>"Product Deleted Successfully", 'status'=>'true', 'cart'=>$cart ]);
        }
        catch(Exception $e){
            return response()->json(['message'=>$e->getMessage(), 'status'=>'false', 'cart'=>[] ]);
        }
        
    }
}

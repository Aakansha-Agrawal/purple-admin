<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\PickupAddress;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $bookings = Booking::all();
            
            $foo = array();
            
            foreach($bookings as $book){
                $foo = [
                    'products' => $book->service,
                    'products' => $book->renter,
                    'products' => $book->product,
                    'products' => $book->product->product_images,
                    'products' => $book->product->address
                ];
            }
            
            return response()->json(['bookings' => $bookings], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'bookings' => []], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $booking = new Booking();

            $validator = Validator::make($request->all(), [
                'service_provider_id' => 'required',
                'product_id' => 'required',
                'package' => 'required',
                'delivery_type' => 'required',
                'purchase_date' => 'required',
                'expiry_date' => 'required',
                'total_price' => 'required',
                'quantity' => 'required',
            ]);

            if ($validator->fails()) {
                $error = $validator->errors()->all()[0];
                return response()->json(['status' => 'false', 'message' => $error, 'user' => []], 422);
            }

            $booking->renter_id = Auth::user()->id;
            $booking->service_provider_id = $request->input('service_provider_id');
            $booking->product_id = $request->input('product_id');
            $booking->package = $request->input('package');
            $booking->quantity = $request->input('quantity');
            $booking->delivery_type = $request->input('delivery_type');
            $booking->purchase_date = $request->input('purchase_date');
            $booking->expiry_date = $request->input('expiry_date');
            $booking->return_date = $request->input('return_date');
            $booking->total_price = $request->input('total_price');
            $booking->status = 'active';

            $booking->save();

            // booking k sath payment store
            $payment = new Payment();
            $payment->booking_id = $booking->id;
            $payment->renter_id = $booking->renter_id;
            $payment->service_provider_id = $booking->service_provider_id;
            $payment->product_id = $booking->product_id;
            $payment->total_amount = $booking->total_price;

            // to get 2% for admin
            $price = ($payment->total_amount * 2) / 100;
            $payment->admin_amount = $price;

            // remaining amount
            $payment->service_provider_amount = $payment->total_amount - $payment->admin_amount;

            $payment->payment_mode = 'online';
            $payment->end_user_status = 'pending';
            $payment->service_provider_status = 'pending';
            $payment->save();

            $validator = Validator::make($request->all(), [
                'address' => 'required',
                'landmark' => 'nullable',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'postal_code' => 'required',
            ]);

            if ($validator->fails()) {
                $error = $validator->errors()->all()[0];
                return response()->json(['status' => 'false', 'message' => $error, 'user' => []], 422);
            }

            if ($request->input('delivery_type') == "delivery" || $request->input('delivery_type') == "shipping") {
                // for saving address in address table
                // code for address on another table
                $address = new PickupAddress();
                $address->address = $request->input('address');
                $address->landmark = $request->input('landmark');
                $address->country = $request->input('country');
                $address->state = $request->input('state');
                $address->city = $request->input('city');
                $address->postal_code = $request->input('postal_code');
                $address->booking_id = $booking->id;
                $address->save();
            }

            return response()->json(['message' => 'Booking Added Succesfully', 'booking' => $booking], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'booking' => []], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $booking = Booking::find($id);
            $booking->status = $request->input('status');
            $booking->return_date = $request->input('return_date');
            $booking->update();
            return response()->json(['message' => 'Status Updated Successfully !', 'status' => 'true', 'booking' => $booking]);
        } catch (Exception $e) {
            return response()->json(['message' => $e, 'status' => 'false']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

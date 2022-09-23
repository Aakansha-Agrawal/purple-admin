<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\PickupAddress;
use App\Models\Product;
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

            foreach ($bookings as $book) {
                $foo = [
                    'service' => $book->service,
                    'renter' => $book->renter,
                    'products' => $book->product,
                    'products' => $book->product->pickup_address,
                    'product_image' => $book->product->product_images,
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
        dd($request->all());
        try {
            foreach ($request->product_id as $id) {
                $booking = new Booking();

                $booking->renter_id = Auth::user()->id;
                $booking->product_id = $id;
                $booking->service_provider_id = Product::where('id', $id)->first()->service_provider_id;
                $booking->quantity = Cart::where('product_id', $id)->first()->quantity;
                $booking->total_price = Cart::where('product_id', $id)->first()->total_amount;
                $booking->start_date = Cart::where('product_id', $id)->first()->start_date;
                $booking->end_date = Cart::where('product_id', $id)->first()->end_date;
                $booking->status = 'active';

                $booking->save();

                // booking k sath payment store
                $payment = new Payment();
                $payment->booking_id = $booking->id;
                $payment->renter_id = $booking->renter_id;
                $payment->service_provider_id = Product::where('id', $booking->product_id)->first()->service_provider_id;
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
            }

            return response()->json(['message' => 'Booking Completed Succesfully', 'status' => 'true'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'booking' => []], 500);
        }
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


    public function showBooking(Request $request)
    {
        $status = ucfirst($request->status);

        if ($request->service_provider_id)
            $bookings = Booking::where('service_provider_id', $request->service_provider_id)->where('status', $status)->get();
        else
            $bookings = Booking::where('renter_id', $request->renter_id)->where('status', $status)->get();


        $foo = array();

        foreach ($bookings as $book) {
            $foo = [
                'service' => $book->service,
                'renter' => $book->renter,
                'products' => $book->product,
                'products' => $book->product->address,
                'product_image' => $book->product->product_images,
            ];
        }

        return response()->json(['bookings' => $bookings], 200);
    }
}

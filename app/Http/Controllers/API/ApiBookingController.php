<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class ApiBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $bookings = Booking::all();
            return response()->json(['bookings'=>$bookings], 200);
        }
        catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage(),'bookings'=>[]], 500);
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
        try{
            $booking = new Booking();
            $booking->renter_id = $request->input('renter_id');
            $booking->service_provider_id = $request->input('service_provider_id');
            $booking->equipment_name = $request->input('equipment_name');
            $booking->purchase_date = $request->input('purchase_date');
            $booking->expiry_date = $request->input('expiry_date');
            $booking->price_type = $request->input('price_type');
            $booking->total_price = $request->input('total_price');

            $booking->save();
            return response()->json(['message'=>'Booking Added Succesfully','booking'=>$booking], 200);
        }
        catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage(),'booking'=>[]], 500);
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
        //
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

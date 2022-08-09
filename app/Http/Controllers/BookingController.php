<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Product;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $bookings = Booking::paginate(5);
            return view('bookings.index', compact('bookings'));
        }
        catch(\Exception $e){
            return view('notfound');
        }
    }

    public function closed()
    {
        $bookings = Booking::onlyTrashed()->orwhere('status', 'closed')->paginate(5);
        return view('bookings.closed', compact('bookings'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::find($id);
        return view('bookings.show', compact('booking'));
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
        $booking = Booking::find($id);
        $booking->status = 'closed';
        $booking->update();
        $booking->destroy($id);
        return redirect()->back()->with('success', 'Booking Deleted Successfully !');
    }

    public function force_delete($id)
    {
        try {
            $product = Product::find($id);

            if ($product) {
                $product->forceDelete($id);
                return response()->json(['message' => 'Product Deleted Succesfully', 'Status' => 'true']);
            } else
                return response()->json(['message' => 'Product Not Found', 'Status' => 'false', 'status' => 'false']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'Status' => 'false', 'status' => 'false']);
        }
    }
}

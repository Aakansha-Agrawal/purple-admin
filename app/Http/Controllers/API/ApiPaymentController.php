<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function payment_renter()
    {
        $payments = Payment::paginate(6);
        return view('payments.renter', compact('payments'));
    }

    public function payment_provider()
    {
        $payments = Payment::paginate(6);
        return view('payments.provider', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  api for payment
    public function get_status()
    {
        try {
            $payment = Payment::all();
            return response()->json(['message' => 'Payment Status Fetched Successfully !', 'status' => 'true', 'payment' => $payment]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 'true', 'payment' => []]);
        }
    }

    public function update_status(Request $request, $id)
    {
        try {
            $payment = Payment::find($id);

            if ($payment) {
                $payment->end_user_status = $request->input('end_user_status') ?? $payment->end_user_status;
                $payment->service_provider_status = $request->input('service_provider_status') ?? $payment->service_provider_status;
                $payment->update();

                return response()->json(['message' => 'Payment Status Updated Successfully !', 'status' => 'true', 'payment' => $payment]);
            } else {
                return response()->json(['message' => 'No Records Found !', 'status' => 'false', 'payment' => []]);
            }
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 'true', 'payment' => []]);
        }
    }
}

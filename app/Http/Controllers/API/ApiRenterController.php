<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Renter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiRenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $renter = Renter::all();
            return response()->json(['renter' => $renter, 'status' => 'true']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'renter' => [], 'status' => 'false']);
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

            $validator = Validator::make($request->all(), [
                'full_name' => 'required',
                'phone' => 'required|min:10|max:10',
                'email' => 'required|email|unique:renters,email',
                'password' => 'required|min:8',
                'profile_pic' => 'required'
            ]);

            if ($validator->fails()) {
                $error = $validator->errors()->all()[0];
                return response()->json(['status' => 'false', 'message' => $error, 'renter' => []], 422);
            }

            $renter = new Renter();
            $renter->full_name = $request->input('full_name');
            $renter->email = $request->input('email');
            $renter->role = 'rentee';
            $renter->phone = $request->input('phone');
            $renter->password = Hash::make($request->input('password'));
            $renter->payment_status = $request->input('payment_status') ?? 'Pending';

            if ($request->profile_pic && $request->profile_pic->isValid()) {
                $filename = time() . '.' . $request->profile_pic->extension();
                $request->profile_pic->move(public_path('images/renters'), $filename);
                $path = "images/renters/$filename";
                $renter->profile_pic = $path;
            }

            $token = $renter->createToken('renterToken')->plainTextToken;
            Auth::login($renter, true);

            $renter->save();
            return response()->json(['message' => 'Renter Added Succesfully', 'renter' => $renter, 'token' => $token, 'status' => 'true']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'renter' => [], 'status' => 'false']);
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

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Renter;
use Illuminate\Http\Request;

class ApiRenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $renter = Renter::all();
            return response()->json(['renter'=>$renter], 200);
        }
        catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage(),'renter'=>[]], 500);
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
            $renter = new Renter();
            $renter->full_name = $request->input('full_name');
            $renter->email = $request->input('email');
            $renter->phone = $request->input('phone');
            $renter->payment_status = $request->input('payment_status') ?? 'Pending';

            if($request->profile_pic && $request->profile_pic->isValid()){
                $filename = time().'.'.$request->profile_pic->extension();
                $request->profile_pic->move(public_path('images/renters'),$filename);
                $path = "images/renters/$filename";
                $renter->profile_pic = $path;
            }

            $renter->save();
            return response()->json(['message'=>'Renter Added Succesfully','renter'=>$renter], 200);
        }
        catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage(),'renter'=>[]], 500);
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

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ApiServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $service = Service::all();
            return response()->json(['service'=>$service], 200);
        }
        catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage(),'service'=>[]], 500);
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
            $service = new Service();
            $service->full_name = $request->input('full_name');
            $service->email = $request->input('email');
            $service->phone = $request->input('phone');
            $service->price = $request->input('price');
            $service->payment_status = $request->input('payment_status') ?? 'Pending';

            if($request->profile_pic && $request->profile_pic->isValid()){
                $filename = time().'.'.$request->profile_pic->extension();
                $request->profile_pic->move(public_path('images/services'),$filename);
                $path = "images/services/$filename";
                $service->profile_pic = $path;
            }

            $service->save();
            return response()->json(['message'=>'Service Added Succesfully','service'=>$service], 200);
        }
        catch(\Exception $e){
            return response()->json(['message'=>$e->getMessage(),'service'=>[]], 500);
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

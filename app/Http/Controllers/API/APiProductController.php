<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class APiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $products = Product::all();
            return response()->json(['products' => $products], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'products' => []], 500);
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
            $product = new Product();
            $product->name = $request->input('name');
            $product->service_provider_id = $request->input('service_provider_id');
            $product->rent_cost = $request->input('rent_cost');
            $product->stocks = $request->input('stocks');

            // ------------ product view content ------------ //
            $product->model = $request->input('model');
            $product->brand = $request->input('brand');
            $product->pickup_address = $request->input('pickup_address');
            $product->shipping_cost = $request->input('shipping_cost');
            $product->description = $request->input('description');
            $product->terms_conditions = $request->input('terms_conditions');
            $product->per_day_price = $request->input('per_day_price');
            $product->per_hour_price = $request->input('per_hour_price');
            $product->two_day_price = $request->input('two_day_price');
            $product->weekly_price = $request->input('weekly_price');
            $product->weekend_price = $request->input('weekend_price');
            $product->package_1 = $request->input('package_1');
            $product->package_2 = $request->input('package_2');

            if ($request->manual_pdf && $request->manual_pdf->isValid()) {
                $filename = time() . '.' . $request->manual_pdf->extension();
                $request->manual_pdf->move(public_path('pdf/products'), $filename);
                $path = "pdf/products/$filename";
                $product->manual_pdf = $path;
            }

            $product->save();

            foreach ($request->file('images') as $imagefile) {
                $image = new Image();
                $path = $imagefile->store('/images/resource', ['disk' =>   'my_files']);
                $image->url = $path;
                $image->product_id = $product->id;
                $image->save();
            }

            return response()->json(['message' => 'Product Added Succesfully', 'product' => $product], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'product' => [], 'image' => []], 500);
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

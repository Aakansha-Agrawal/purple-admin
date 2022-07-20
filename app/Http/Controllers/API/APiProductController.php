<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\PickupAddress;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiProductController extends Controller
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
            return response()->json(['products' => $products, 'status' => 'true']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'products' => [], 'status' => 'false']);
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
            $product->service_provider_id = Auth::user()->id;

            // ------------ product view content ------------ //
            $product->model = $request->input('model');
            $product->brand = $request->input('brand');
            $product->shipping_cost = $request->input('shipping_cost');
            $product->more_info = $request->input('more_info');
            $product->terms_conditions = $request->input('terms_conditions');
            $product->one_day_price = $request->input('one_day_price');
            $product->two_day_price = $request->input('two_day_price');
            $product->three_day_price = $request->input('three_day_price');
            $product->weekly_price = $request->input('weekly_price');
            $product->weekend_price = $request->input('weekend_price');
            $product->package_1 = $request->input('package_1');
            $product->package_2 = $request->input('package_2');
            $product->package_1_price = $request->input('package_1_price');
            $product->package_2_price = $request->input('package_2_price');
            $product->inventory = $request->input('inventory');
            $product->delivery = $request->input('delivery');
            $product->category_id = $request->input('category_id');

            if ($request->manual_pdf && $request->manual_pdf->isValid()) {
                $filename = time() . '.' . $request->manual_pdf->extension();
                $request->manual_pdf->move(public_path('pdf/products'), $filename);
                $path = "pdf/products/$filename";
                $product->manual_pdf = $path;
            }

            $product->save();

            // code for address on another table
            $address = new PickupAddress();
            $address->address = $request->input('address');
            $address->landmark = $request->input('landmark');
            $address->country = $request->input('country');
            $address->state = $request->input('state');
            $address->city = $request->input('city');
            $address->postal_code = $request->input('postal_code');
            $address->product_id = $product->id;
            $address->save();

            // code for multiple images in product image table
            foreach ($request->file('images') as $imagefile) {
                $image = new ProductImage();
                $path = $imagefile->store('/images/products', ['disk' => 'my_files']);
                $image->url = $path;
                $image->product_id = $product->id;
                $image->save();
            }

            return response()->json(['message' => 'Product Added Succesfully', 'product' => $product, 'address' => $address, 'status' => 'true']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'product' => [], 'status' => 'false']);
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
            $product = Product::find($id);

            if ($product) {
                $product->name = $request->input('name');

                // ------------ product view content ------------ //
                $product->model = $request->input('model');
                $product->brand = $request->input('brand');
                $product->shipping_cost = $request->input('shipping_cost');
                $product->more_info = $request->input('more_info');
                $product->terms_conditions = $request->input('terms_conditions');
                $product->one_day_price = $request->input('one_day_price');
                $product->two_day_price = $request->input('two_day_price');
                $product->three_day_price = $request->input('three_day_price');
                $product->weekly_price = $request->input('weekly_price');
                $product->weekend_price = $request->input('weekend_price');
                $product->package_1 = $request->input('package_1');
                $product->package_2 = $request->input('package_2');
                $product->package_1_price = $request->input('package_1_price');
                $product->package_2_price = $request->input('package_2_price');
                $product->inventory = $request->input('inventory');
                $product->delivery = $request->input('delivery');
                $product->category_id = $request->input('category_id');

                if ($request->manual_pdf && $request->manual_pdf->isValid()) {
                    $filename = time() . '.' . $request->manual_pdf->extension();
                    $request->manual_pdf->move(public_path('pdf/products'), $filename);
                    $path = "pdf/products/$filename";
                    $product->manual_pdf = $path;
                }

                $product->update();

                // code for address on another table
                $address = new PickupAddress();
                $address->address = $request->input('address');
                $address->landmark = $request->input('landmark');
                $address->country = $request->input('country');
                $address->state = $request->input('state');
                $address->city = $request->input('city');
                $address->postal_code = $request->input('postal_code');
                $address->product_id = $product->id;
                $address->save();

                foreach ($request->file('images') as $imagefile) {
                    $image = new ProductImage();
                    $path = $imagefile->store('/images/products', ['disk' =>   'my_files']);
                    $image->url = $path;
                    $image->product_id = $product->id;
                    $image->update();
                }

                return response()->json(['message' => 'Product Updated Succesfully', 'product' => $product, 'address' => $address, 'status' => 'true']);
            } else {
                return response()->json(['message' => 'Product Not Found', 'product' => [], 'status' => 'false']);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'product' => [], 'status' => 'false']);
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

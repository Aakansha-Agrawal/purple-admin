<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PickupAddress;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

            $foo = array();

            // for merging category table into duty table and getting boat from duty table
            // nested relation table data
            foreach ($products as $product) {
                $foo = [
                    'product_images' => $product->product_images,
                    'pickup_address' => $product->pickup_address,
                ];
            }

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

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'images'=>'required',
                'model' => 'required',
                'brand' => 'required',
                'inventory' => 'required',
                'category_id' => 'required',
            ]);

            if ($validator->fails()) {
                $error = $validator->errors()->all()[0];
                return response()->json(['status' => 'false', 'message' => $error, 'user' => []], 422);
            }

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

            return response()->json(['message' => 'Product Added Succesfully', 'product' => $product, 'product_images' => $image, 'address' => $address, 'status' => 'true']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'product' => [], 'status' => 'false']);
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

                if($request->file('images')){
                    foreach ($request->file('images') as $imagefile) {
                        $image = new ProductImage();
                        $path = $imagefile->store('/images/products', ['disk' => 'my_files']);
                        $image->url = $path;
                        $image->product_id = $product->id;
                        $image->update();
                    }
                }

                return response()->json(['message' => 'Product Updated Succesfully', 'product' => $product, 'product_images' => $image ?? '', 'address' => $address, 'status' => 'true']);
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


    // to get product based on category
    public function get_products()
    {
        try {
            $category = Category::all();

            if ($category->count() == 0) {
                return response()->json(['message' => "No Records Found", 'category' => []], 500);
            }

            $foo = array();

            // for merging category table into duty table and getting boat from duty table
            // nested relation table data
            foreach ($category as $cat) {
                $foo = [
                    'products' => $cat->data,
                ];
            
                foreach($cat->data as $product){
                    $foo = [
                        'product_images' => $product->product_images,   
                        'address' => $product->pickup_address,   
                    ];
                }
            }

            return response()->json(['category' => $category, 'status' => 'true'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'category' => [], 'status' => 'false'], 500);
        }
    }

    public function get_user_products(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();

            $products = Product::where('service_provider_id', $user->id)->get();
            if ($products->count() == 0) {
                return response()->json(['message' => "No Products Found", 'status' => 'false'], 500);
            }

            return response()->json(['products' => $products, 'status' => 'true'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'user' => [], 'status' => 'false'], 500);
        }
    }
    
    // fetch category products with cat id
    public function category_products($id)
    {
        try {
            $category = Category::find($id);

            if (!$category) {
                return response()->json(['message' => "No Records Found", 'category' => []], 500);
            }

            $foo = array();

            // for merging category table into duty table and getting boat from duty table
            // nested relation table data
            $foo = [
                'products' => $category->data,
            ];
            
            foreach($category->data as $product){
                $foo = [
                    'product_images' => $product->product_images,   
                    'address' => $product->pickup_address,   
                ];
            }
            
            return response()->json(['category' => $category, 'status' => 'true'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'category' => [], 'status' => 'false'], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(7);
        return view('products.index', compact('products'));
    }

    public function approve()
    {
        $products = Product::where('status','accept')->paginate(7);
        return view('products.approve', compact('products'));
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
        $product = Product::find($id);
        // dd($product->product_images);
        return view('products.show', compact('product'));
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
    public function destroy($id, Request $request)
    {
        $product = Product::find($id);
        $product->reason = $request->input('reason');
        $product->save();
        $product->destroy($id);
        return redirect()->back()->with('success', 'Product Deleted Successfully !');
    }

    public function deleted_data()
    {
        $products = Product::where('status','reject')->withTrashed()->paginate(6);
        return view('products.trash', compact('products'));
    }

    public function restore($id)
    {
        $products = Product::onlyTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'Product Restored Successfully !');
    }

    public function download($url)
    {
        $file_path_full = base_path() . "/pdf/products/" . $url;
        $file_path = pathinfo(base_path() . "/pdf/products/" . $url);

        $basename = $file_path['basename'];
        $path = $file_path['dirname'];
        return response()->download($file_path_full, $basename, ['Content-Type' => 'application/force-download']);
    }
}

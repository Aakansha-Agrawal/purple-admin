<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::paginate(3);
        return view('banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $i = 1;
        // code for multiple images in product image table
        foreach ($request->file('banners') as $imagefile) {
            $banner = new Banner();
            $path = $imagefile->store('/images/banners', ['disk' => 'my_files']);
            $banner->title = 'Banner ' . $i;
            $banner->banner = $path;
            $i++;
            // dd($banner->banner);
            $banner->save();
        }
        return redirect("/app_banner")->with('success', 'Banners Added Successfully!');
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
        $banner = Banner::find($id);
        return view('banner.edit', compact('banner'));
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
        $banner = Banner::find($id);
        if ($request->banner && $request->banner->isValid()) {
            $filename = time() . '.' . $request->banner->extension();
            $request->banner->move(public_path("images/banners"), $filename);
            $path = "images/banners/$filename";
            $banner->banner = $path;
        }
        $banner->update();
        return redirect("/app_banner")->with('success', 'Banner Updated Successfully!');
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


    // api to get all banners
    public function api_index()
    {
        try {
            $banner = Banner::all();
            return response()->json(['message' => "Banner Fetched Successfully", 'status' => 'true', 'banner' => $banner]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => 'false']);
        }
    }
}

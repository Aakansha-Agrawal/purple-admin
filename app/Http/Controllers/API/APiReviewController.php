<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $reviews = Review::all();
            $foo = array();

            // for merging category table into duty table and getting boat from duty table
            // nested relation table data
            foreach ($reviews as $review) {
                $foo = [
                    'service_provider' => $review->service_provider,
                    'end_user' => $review->end_user,
                ];
            }
            
            return response()->json(['review' => $reviews], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'review' => []], 500);
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
            $review = new Review();
            $review->service_provider_id = $request->input('service_provider_id');
            $review->renter_id = Auth::user()->id;
            $review->rating = $request->input('rating');
            $review->review = $request->input('review');

            $review->save();
            return response()->json(['message' => 'Review Added Succesfully', 'review' => $review], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'review' => []], 500);
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

    // get review data for service provider
    function get_review(Request $request)
    {
        try {
            $reviews = Review::where('service_provider_id', Auth::user()->id)->get();

            // dd(Auth::user()->id, Auth::user()->email);

            if (!$reviews) {
                return response([
                    'message' => 'No Data Found.',
                    'status' => 'false'
                ], 404);
            }

            $foo = array();

            // for merging category table into duty table and getting boat from duty table
            // nested relation table data
            foreach ($reviews as $review) {
                $foo = [
                    'service_provider' => $review->service_provider,
                    'end_user' => $review->end_user,
                ];
            }

            return response()->json(['status' => 'true', 'reviews' => $reviews]);
        } catch (Exception $e) {
            return response()->json(['message' => $e, 'status' => 'false']);
        }
    }
}

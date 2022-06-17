<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }

    public function booking(){
        return view('bookings');
    }

    public function contact(){
        $contact = Contact::all();
        return view('contact', compact('contact'));
    }

    public function renter(){
        return view('renter');
    }

    public function review(){
        $reviews = Review::all();
        // dd($reviews);
        return view('reviews', compact('reviews'));
    }

    public function service(){
        return view('services');
    }

    public function payment_renter(){
        return view('payment');
    }

    public function payment_provider(){
        return view('payment1');
    }

    public function login(){
        return view('login');
    }

    public function viewdetails(){
        return view('viewdetails');
    }

}

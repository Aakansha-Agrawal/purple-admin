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

    public function contact(){
        $contact = Contact::paginate(5);
        return view('contact', compact('contact'));
    }

    public function review(){
        $reviews = Review::paginate(5);
        return view('reviews', compact('reviews'));
    }

    public function payment_renter(){
        return view('payment');
    }

    public function payment_provider(){
        return view('payment1');
    }
}

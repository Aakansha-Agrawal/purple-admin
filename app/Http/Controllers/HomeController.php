<?php

namespace App\Http\Controllers;

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
        return view('contact');
    }

    public function renter(){
        return view('renter');
    }

    public function review(){
        return view('reviews');
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

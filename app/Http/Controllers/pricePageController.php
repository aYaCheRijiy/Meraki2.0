<?php

namespace App\Http\Controllers;

class pricePageController extends Controller
{
    public function index() {
        $plans = config('pricing.plans');
        return view('pages.price', compact('plans'));
    }
}

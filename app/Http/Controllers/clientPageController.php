<?php

namespace App\Http\Controllers;

class clientPageController extends Controller
{
    public function index() {
        return view('pages.client');
    }
}

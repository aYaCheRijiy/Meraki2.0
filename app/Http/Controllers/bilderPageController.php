<?php

namespace App\Http\Controllers;

class bilderPageController extends Controller
{
    public function index() {
        $userId = request('user_id'); // Получаем user_id из GET-параметра
        return view('pages.bilder', compact('userId'));
    }
}

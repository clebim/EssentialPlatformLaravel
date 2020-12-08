<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function toIndex() {
        return redirect()->route('home');
    }

    public function index()
    {
        return view('pages.dashboard');
    }
}

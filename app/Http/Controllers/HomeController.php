<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('home');
    }
    public function services()
    {
        return view('services');
    }
    public function briefcase()
    {
        return view('briefcase');
    }
    public function contacts()
    {
        return view('contacts');
    }
}

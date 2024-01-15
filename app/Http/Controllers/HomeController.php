<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function layanan_kami()
    {
        return view('layanan-kami');
    }

    public function tentang_kami()
    {
        return view('tentang-kami');
    }

    public function artikel()
    {
        return view('artikel');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Faker\Factory as Faker;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function page_home()
    {
        return view('admin.website.home');
    }


}

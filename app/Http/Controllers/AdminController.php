<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory as Faker;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function order()
    {
        $faker = Faker::create();
        return view('admin.order')->with('faker', $faker);
    }

    public function order_detail($order_id)
    {
        $faker = Faker::create();
        return view('admin.order_detail')->with('faker', $faker);
    }

    public function page_home()
    {
        return view('admin.website.home');
    }


}

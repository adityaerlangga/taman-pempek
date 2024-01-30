<?php

namespace App\Http\Controllers\Admin;


use Faker\Factory as Faker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
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
}

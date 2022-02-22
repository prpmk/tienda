<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    //
    public function index(){
      $orders = Order::orderBy('id','desc')->paginate(5);
      //dd($orders);
      return view('admin.order.index', compact('orders'));
    }
}

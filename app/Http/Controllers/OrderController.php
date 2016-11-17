<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{

  const LIMIT = 100;

    public function index(Request $request)
    {
      $this->validate($request, [
          'email' => 'required|email'
      ]);

      $orders = \App\Order::whereEmail($request->get('email'))
        ->orderBy('created_at', 'DESC')
        ->take(self::LIMIT)
        ->get();

      return view('orders', compact('orders'));

    }

}

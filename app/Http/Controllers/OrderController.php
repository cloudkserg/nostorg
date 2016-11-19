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


    public function create()
    {
      $order = new \App\Order();
      return view('order.order', compact('order'));
    }

    public function store(Request $request)
    {
            $this->validate($request, [
                'size' => 'required|string',
                'name' => 'required|string',
                'phone' => 'string',
                'email' => 'required|email',
                'delivery' => 'string',
                'comment' => 'string'
            ]);

            $order= new \App\Order;
            $order->create($request->only('size', 'name', 'phone', 'email', 'delivery', 'comment'));

            \Session::flash('message', 'Заказ создан!');
            return \Redirect::to('');


    }

}

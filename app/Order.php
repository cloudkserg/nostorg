<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'status', 'date', 'date_out', 'order_start',
        'action_id', 'price', 'packer',
        'courier_id', 'delivery',
        'profit', 'size', 'name',
        'phone', 'email', 'address',
        'comment', 'wish'
    ];

    protected $dates = [
        'date', 'date_out', 'order_start'
    ];

    public function courier()
    {
      return $this->belongsTo(Courier::class);
    }

    public function action()
    {
      return $this->belongsTo(Action::class);
    }

    protected static function boot()
    {
        static::creating(function ($order) {
            if (empty($order->date)) {
                $order->date = \Carbon\Carbon::create();
            }
            if (empty($order->status)) {
                $order->status = \App\Type\OrderStatus::ACTIVE;
            }

            return true;
        });
    }

}

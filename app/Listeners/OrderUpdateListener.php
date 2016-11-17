<?php

namespace App\Listeners;

use App\Events\OrderUpdate;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderUpdateListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderUpdate  $event
     * @return void
     */
    public function handle(OrderUpdate $event)
    {
        $item = $event->order;
        if (!empty($item->email) and $item->isChanged()) {
          \Mail::to($item->email)
              ->send(new \App\Mail\OrderUpdateMail($item));
        }
    }


    private function isChanged(\App\Order $item)
    {
      $attrs = [
        'status', 'date', 'date_out', 'order_start',
        'action_id', 'price', 'delivery',
        'size', 'name',
        'phone', 'address'
      ];
      foreach ($attrs as $attr) {
        if ($item->isDirty($attr)) {
          return true;
        }
      }
      return false;
    }
}

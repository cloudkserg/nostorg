<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use \App\Order;

class OrderUpdateMail extends Mailable
{
    use Queueable, SerializesModels;

    public $item;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $item)
    {
        $this->item = $item;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('view.name', ['item' => $this->item])
          ->subject('Изменения по заказу . ' . $this->item->id . ' на ' . config('app.name'));
    }
}

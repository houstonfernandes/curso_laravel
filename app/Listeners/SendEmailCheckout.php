<?php

namespace CodeCommerce\Listeners;

use CodeCommerce\Events\CheckoutEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailCheckout
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
     * @param  CheckoutEvent  $event
     * @return void
     */
    public function handle(CheckoutEvent $event)
    {
        echo "evento checkout - listener - send email";
        $order = $event->getOrder();
       // dd($order);
        Mail::send('store.checkout_mail', compact('order'),function($message) use($order) {
            $message->from('houstonfernandes@gmail.com', 'CODE Commerce');
            $message->to($order->user->email, $order->user->name)->subject('compra realizada - pedido n.' . $order->id);
        });
    }
}

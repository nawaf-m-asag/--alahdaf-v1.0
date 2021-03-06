<?php

namespace App\Listeners;

use App\Events\PackagesOrderSuccess;
use App\Mail\PlaceOrder;
use App\Order;
use App\PaymentLogs;
use App\PricePlan;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class PakcagesOrderSuccessMailSendUser
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
     * @param  PackagesOrderSuccess  $event
     * @return void
     */
    public function handle(PackagesOrderSuccess $event)
    {
        $orders = $event->orders;
        if (!isset($orders['order_id']) && !isset($orders['transaction_id'])){return;}
        $order_details = Order::find($orders['order_id']);
        $package_details = PricePlan::where('id', $order_details->package_id)->first();
        $payment_details = PaymentLogs::where('order_id', $orders['order_id'])->first();
        $all_fields = unserialize($order_details->custom_fields,['class' => false]);
        unset($all_fields['package']);

        $all_attachment = unserialize($order_details->attachment,['class' => false]);
        $subject = __('your order has been placed');
        $message = __('your order has been placed.') . ' #' . $orders['order_id'];
        $message .= ' ' . __('at') . ' ' . date_format($order_details->created_at, 'd F Y H:m:s');
        $message .= ' ' . __('via') . ' ' . str_replace('_', ' ', $payment_details->package_gateway);

        try{
            Mail::to($payment_details->email)->send(new PlaceOrder([
                'data' => $order_details,
                'subject' => $subject,
                'message' => $message,
                'package' => $package_details,
                'attachment_list' => $all_attachment,
                'payment_log' => $payment_details
            ]));
        }catch (\Exception $e){
            //show error message
        }
    }
}

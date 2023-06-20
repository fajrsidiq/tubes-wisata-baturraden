<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function showPaymentPage(Request $request)
    {
        $orderId = $request->session()->get('order_id');
        $order = Order::findOrFail($orderId);
        $price = 20000;

        return view('payment.payment-page', compact('order', 'price'));
    }
 
    public function processPayment(Request $request)
    {
        $orderId = $request->session()->get('order_id');
        $order = Order::findOrFail($orderId);
        $price = 20000;

        // Set your Midtrans credentials
        Config::$serverKey = 'SB-Mid-server-NW6Rx6DtO7e-2HDNZZIxUF9L';
        Config::$clientKey = 'SB-Mid-client-_DCM3k8KdjWHMFNU';
        Config::$isProduction = 'false';

        // Create the payment token
        $params = array(
            'transaction_details' => array(
                'order_id' => $order->order_id,
                'gross_amount' => $price,
            ),
            'customer_details' => array(
                'first_name' => $order->user->name,
                'email' => $order->user->email,
            ),
        );

        $paymentToken = Snap::getSnapToken($params);

        // Redirect to the payment page with the payment token
        return redirect()->away(Snap::getSnapUrl($paymentToken));
    }

    public function handlePaymentCallback(Request $request)
    {
        // Handle the payment callback logic here
        // This method will be triggered by the payment gateway callback

        // Update the order status or perform any other necessary actions

        // Redirect to the appropriate page
        return redirect()->route('payment.success');
    }

    public function showPaymentSuccessPage()
    {
        // Show the payment success page
        return view('payment.success');
    }
}

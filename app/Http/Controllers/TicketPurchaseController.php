<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketPurchaseController extends Controller
{
    public function showTicketPurchaseForm()
    {
        return view('tickets.purchase');
    }

    public function processTicketPurchase(Request $request)
    {
        $quantity = $request->input('quantity');
        
        // Validate the input
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);

        // Create an order
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->save();

        // Create tickets for the order
        for ($i = 0; $i < $quantity; $i++) {
            $ticket = new Ticket();
            $ticket->order_id = $order->id;
            $ticket->save();
        }

        // Redirect to payment page or any other desired page
        return redirect()->route('payment');
    }
}

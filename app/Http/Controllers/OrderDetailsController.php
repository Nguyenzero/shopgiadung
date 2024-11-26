<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class OrderDetailsController extends Controller
{
    public function show($id)
    {
        $order = null;
        if (Auth::check()) {
            $user = Auth::user();
            $order = Customer::with('carts.product')->where('id', $id)->where('email', $user->email)->firstOrFail();
        }
        return view('order.order_details', [
            'title' => 'Order Details',
            'order' => $order
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class OrderHistoryController extends Controller
{
    public function index()
    {
        $orders = [];
        if (Auth::check()) {
            $user = Auth::user();
            $orders = Customer::where('email', $user->email)->get();
        }
        return view('order.order_history', [
            'title' => 'Order History',
            'orders' => $orders
        ]);
    }
}
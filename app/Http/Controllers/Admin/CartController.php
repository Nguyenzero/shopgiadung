<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Services\CartService;

class CartController extends Controller
{
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        return view('admin.carts.customer', [
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'customers' => $this->cart->getCustomer()
        ]);
    }

    public function show(Customer $customer)
    {
        $carts = $this->cart->getProductForCart($customer);

        return view('admin.carts.detail', [
            'title' => 'Chi Tiết Đơn Hàng: ' . $customer->name,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }

    public function update(Request $request, $customerId)
    {
        $customer = Customer::find($customerId);
        $customer->status = $request->input('status');
        $customer->save();

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }

    public function destroy(Request $request)
    {
        $customer = Customer::find($request->input('id'));
        if ($customer) {
            $customer->delete();
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công khách hàng'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }
}

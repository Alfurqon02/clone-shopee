<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class DashboardHomeController extends Controller
{
    public function index()
    {
        // $order = Order::all();
        $item = DB::table('orders')
            ->join('items', 'items.id', '=', 'orders.item_id')
            ->join('users', 'users.id', '=', 'items.user_id')
            ->join('users as buyer', 'buyer.id', '=', 'orders.user_id')
            ->join('shipments', 'shipments.id', '=', 'orders.shipment_id')
            ->where('items.user_id', '=', Auth::user()->id)
            ->where('orders.status', '=', 'Not Confirmed')
            ->select(
                'items.stock AS stock',
                'items.name AS name',
                'orders.quantity AS amount',
                'orders.total_price AS total_price',
                'buyer.name AS buyer_name',
                'orders.id AS order_id',
                'orders.address AS address',
                'orders.receiver AS receiver_name',
                'shipments.name AS shipment',
            )
            ->get();

        $confirmed_item = DB::table('orders')
            ->join('items', 'items.id', '=', 'orders.item_id')
            ->join('users', 'users.id', '=', 'items.user_id')
            ->join('users as buyer', 'buyer.id', '=', 'orders.user_id')
            ->join('shipments', 'shipments.id', '=', 'orders.shipment_id')
            ->where('items.user_id', '=', Auth::user()->id)
            ->where('orders.status', '=', 'Confirmed')
            ->select(
                'items.stock AS stock',
                'items.name AS name',
                'orders.quantity AS amount',
                'orders.total_price AS total_price',
                'buyer.name AS buyer_name',
                'orders.id AS order_id',
                'orders.address AS address',
                'orders.receiver AS receiver_name',
                'shipments.name AS shipment',
                'orders.status AS status',
            )
            ->get();

        $all_orders = DB::table('orders')
        ->join('items', 'items.id', '=', 'orders.item_id')
        ->join('users', 'users.id', '=', 'items.user_id')
        ->join('users as buyer', 'buyer.id', '=', 'orders.user_id')
        ->join('shipments', 'shipments.id', '=', 'orders.shipment_id')
        ->where('items.user_id', '=', Auth::user()->id)
        ->select(
            'items.stock AS stock',
            'items.name AS name',
            'orders.quantity AS amount',
            'orders.total_price AS total_price',
            'buyer.name AS buyer_name',
            'orders.id AS order_id',
            'orders.address AS address',
            'orders.receiver AS receiver_name',
            'shipments.name AS shipment',
            'orders.status AS status',
        )
        ->get();

        $sales = DB::table('orders')
            ->join('items', 'items.id', '=', 'orders.item_id')
            ->where('items.user_id', '=', Auth::user()->id)
            ->where('orders.status', '=', 'Confirmed')
            ->select(
                'orders.total_price AS total_price',
            )
            ->get()
            ->sum('total_price');

        $orders = DB::table('orders')
            ->join('items', 'items.id', '=', 'orders.item_id')
            ->where('items.user_id', '=', Auth::user()->id)
            ->where('orders.status', '=', 'Success')
            ->get();

        $products = DB::table('items')
            ->where('items.user_id', '=', Auth::user()->id)
            ->get();

        $amount = DB::table('orders')
            ->join('items', 'items.id', '=', 'orders.item_id')
            ->where('items.user_id', '=', Auth::user()->id)
            ->select(
                'orders.quantity AS amount',
            )
            ->get()
            ->sum('amount');

        return view('dashboard-page.home.index', [
            'items' => $item,
            'confirmed_item' => $confirmed_item,
            'sales' => $sales,
            'orders' => $orders,
            'products' => $products,
            'amount' => $amount,
            'all_orders' => $all_orders,
        ]);
    }

    public function confirm($id)
    {
        Order::findOrFail($id)->update(['status' => 'Confirmed']);
        return redirect(route('my.home'))->with('success', 'Order Confrimed');
    }
    public function decline()
    {
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        $countOrder = Order::where('status', 'completed')->count();
        $countProduct = Product::where('status', 'active')->count();
        $total = Order::where('status', 'completed')->sum('total_price');
        // return view('master.dashboard', [
        return view('new-admin.index', [
            'countOrder' => $countOrder,
            'countProduct' => $countProduct,
            'total' => $total
        ]);
    }
}

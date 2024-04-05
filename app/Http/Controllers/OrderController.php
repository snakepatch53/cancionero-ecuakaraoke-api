<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        // se debe retornar con un orden descendente
        $orders = Order::with('client', 'song')->orderBy('created_at', 'desc')->paginate(20);
        // $orders = Order::with('client', 'song')->paginate(20);
        return response()->json($orders);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Order $order)
    {
        //
    }

    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        //
    }
}

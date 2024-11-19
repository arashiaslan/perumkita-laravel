<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function updateOrder(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,dibuat,dikirim,diterima,selesai',
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->route('admin.kantin.order')->with('success', 'Status pesanan berhasil diperbarui.');
    }
}


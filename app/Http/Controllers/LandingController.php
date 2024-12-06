<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Complaint;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.index');
    }

    public function about()
    {
        return view('landing.about');
    }
    public function features()
    {
        // Chart 1: Data untuk Order
        $orderStatuses = ['pending', 'dibuat', 'dikirim', 'diterima', 'selesai'];
        $orderCounts = [];
        foreach ($orderStatuses as $status) {
            $orderCounts[] = Order::where('status', $status)->count();
        }

        // Chart 2: Data untuk Complaint
        $complaintStatuses = ['pending', 'proses', 'selesai'];
        $complaintCounts = [];
        foreach ($complaintStatuses as $status) {
            $complaintCounts[] = Complaint::where('status', $status)->count();
        }

        // Chart 3: Data untuk User dengan atribut istri
        $userCounts = [
            User::where('jumlah_istri', 1)->count(),
            User::where('jumlah_istri', 2)->count(),
            User::where('jumlah_istri', 3)->count(),
        ];

        return view('landing.features', compact('orderCounts', 'complaintCounts', 'userCounts'));
    }
}

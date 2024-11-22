@extends('layouts.base-app')
@section('content')
    <div class="card shadow-lg mx-4">
        <div class="container-fluid py-4">
            <h2 class="mb-4 text-center">Pesanan Anda</h2>
            <div class="row">
                <!-- Menggunakan d-flex agar item mengikuti grid dan responsif -->
                @foreach ($orders as $order)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card card-profile card-plain h-100 d-flex flex-row">
                            <div class="col-5">
                                <a href="javascript:;">
                                    <div class="position-relative">
                                        <div class="blur-shadow-image">
                                            <img class="w-100 rounded-3 shadow-lg"
                                                src="{{ asset($order->menu->image) }}">
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-7 ps-3 my-auto">
                                <div class="card-body text-left">
                                    <h5 class="font-weight-bolder mb-0">{{ $order->menu->name }}</h5>
                                    <p class="text-uppercase text-sm font-weight-bold mb-2">Resep Spesial</p>
                                    <p class="mb-0">Jumlah Pesanan: {{ $order->quantity }} Pcs</p>
                                    <p class="mb-4">Total Payment: Rp.{{ number_format($order->total_price) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

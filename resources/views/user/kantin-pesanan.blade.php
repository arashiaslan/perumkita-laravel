@extends('layouts.base-app')
@section('content')
    <div class="card shadow-lg mx-4">
        <div class="container-fluid py-4">
            <div class="row">
                <h1 class="my-5 text-center">Pesanan Saya</h1>
                @foreach ($orders as $order)
                    <div class="col-lg-6 col-md-6 mb-4 ps-6">
                        <div class="card card-profile card-plain">
                            <div class="row">
                                <div class="col-lg-5">
                                    <a href="javascript:;">
                                        <div class="position-relative">
                                            <div class="blur-shadow-image">
                                                <img class="w-100 rounded-3 shadow-lg"
                                                    src="{{ asset($order->menu->image) }}">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-7 ps-0 my-auto">
                                    <div class="card-body text-left">
                                        <div class="p-md-0 pt-3">
                                            <h5 class="font-weight-bolder mb-0">{{ $order->menu->name }}</h5>
                                            <p class="text-uppercase text-sm font-weight-bold mb-2">Resep Spesial</p>
                                        </div>
                                        <p class="mb-0 text-sm fst-italic">{{ $order->created_at->format('d F Y') }}</p>
                                        <p class="mb-0">Jumlah Pesanan: {{ $order->quantity }} Pcs</p>
                                        <p class="mb-0">Total Payment: Rp.{{ number_format($order->total_price) }}</p>
                                        <p class="mb-4">{!! $order->status_badge !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Paginasi -->
        <div class="d-flex justify-content-center">
            {{ $orders->links('vendor.pagination') }}
        </div>
    </div>
@endsection

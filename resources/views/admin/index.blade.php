@extends('layouts.base-app')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Kas Warga</p>
                                    <h5 class="font-weight-bolder">
                                        Rp.{{ number_format(\App\Models\Order::where('status', 'Selesai')->sum('total_price')) }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Warga</p>
                                    <h5 class="font-weight-bolder">
                                        {{ \App\Models\User::count() }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Pengaduan Masuk</p>
                                    <h5 class="font-weight-bolder">
                                        {{ \App\Models\Complaint::where('status', 'Pending')->count() }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Pesanan Kantin</p>
                                    <h5 class="font-weight-bolder">
                                        {{ \App\Models\Order::where('status', 'Pending')->count() }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-body p-3 m-3">
                        <div class="row">
                            <div class="col-4 col-sm-3 col-md-2">
                                <a href="{{ route('admin.complaints.index') }}">
                                    <div class="card mb-3 pt-3 px-3 shadow-lg text-center">
                                        <img src="{{ asset('images/icon/pengaduan.png') }}" alt="">
                                        <p class="font-weight-bold pt-2">Komplen</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 col-sm-3 col-md-2">
                                <a href="{{ route('admin.galeri.index') }}">
                                    <div class="card mb-3 pt-3 px-3 shadow-lg text-center">
                                        <img src="{{ asset('images/icon/galeri.png') }}" alt="">
                                        <p class="font-weight-bold pt-2">Galeri</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 col-sm-3 col-md-2">
                                <a href="{{ route('admin.kantin.index') }}">
                                    <div class="card mb-3 pt-3 px-3 shadow-lg text-center">
                                        <img src="{{ asset('images/icon/kantin.png') }}" alt="">
                                        <p class="font-weight-bold pt-2">Kantin</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 col-sm-3 col-md-2">
                                <a href="{{ route('user.jadwal-sholat') }}">
                                    <div class="card mb-3 pt-3 px-3 shadow-lg text-center">
                                        <img src="{{ asset('images/icon/jadwalsolat.png') }}" alt="">
                                        <p class="font-weight-bold pt-2">Sholat</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 col-sm-3 col-md-2">
                                <a href="{{ route('admin.artikel.index') }}">
                                    <div class="card mb-3 pt-3 px-3 shadow-lg text-center">
                                        <img src="{{ asset('images/icon/artikel.png') }}" alt="">
                                        <p class="font-weight-bold pt-2">Artikel</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 col-sm-3 col-md-2">
                                <a href="">
                                    <div class="card mb-3 pt-3 px-3 shadow-lg text-center">
                                        <img src="{{ asset('images/icon/lainnya.png') }}" alt="">
                                        <p class="font-weight-bold pt-2">Lainnya</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card">
                    <img src="{{ asset('images/brosur.png') }}" alt="" class="img-fluid w-100 rounded-3 shadow-lg">
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card">
                        <img src="{{ asset('images/brosur2.png') }}" alt=""
                            class="img-fluid w-100 rounded-3 shadow-lg">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-body p-3 m-3">
                        <div class="row mb-4">
                            <div class="col">
                                <p class="text-lg mb-0 text-uppercase font-weight-bolder">Pengaduan Terbaru</p>
                            </div>
                            <div class="col">
                                <a href="{{ route('admin.complaints.index') }}">
                                    <p class="text-sm mb-0 text-secondary text-end text-uppercase font-weight-bold">Lihat
                                        Semua ></p>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($complaints as $complaint)
                                <div class="card my-2">
                                    <a href="">
                                    <div class="card-body pt-3">
                                        <div class="author align-items-center">
                                            <img src="{{asset('images/icon/pengaduan.png')}}" alt="..."
                                                class="avatar shadow p-2">
                                            <div class="name ps-3">
                                                <span>{{$complaint->title}}</span>
                                                <div class="stats">
                                                    <small>{{$complaint->user->name}}</small>
                                                    <p>{{$complaint->description, 30}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

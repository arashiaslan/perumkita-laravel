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
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Jumlah Warga</p>
                                <h5 class="font-weight-bolder">
                                    {{ \App\Models\User::count() }} Kepala Keluarga
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
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Pengaduan Saya</p>
                                <h5 class="font-weight-bolder">
                                    {{ \App\Models\Complaint::where('user_id', auth()->user()->id)->count() }} Pengaduan
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
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Pesanan Saya</p>
                                <h5 class="font-weight-bolder">
                                    {{ \App\Models\Order::where('user_id', auth()->user()->id)->count() }} Pesanan
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
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Tagihan Kantin</p>
                                <h5 class="font-weight-bolder">
                                    Rp.{{ number_format( \App\Models\Order::where('user_id', auth()->id())->whereIn('status', ['pending', 'dibuat', 'dikirim', 'diterima'])->sum('total_price') ) }}
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
    </div>
    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-body p-3 m-3">
                    <div class="row">
                        <div class="col-4 col-sm-3 col-md-2">
                            <a href="{{ route('user.pengaduan') }}">
                                <div class="card mb-3 pt-3 px-3 shadow-lg text-center">
                                    <img src="{{ asset('images/icon/pengaduan.png') }}" alt="">
                                    <p class="font-weight-bold pt-2 text-sm">Komplen</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-4 col-sm-3 col-md-2">
                            <a href="{{ route('user.galeri') }}">
                                <div class="card mb-3 pt-3 px-3 shadow-lg text-center">
                                    <img src="{{ asset('images/icon/galeri.png') }}" alt="">
                                    <p class="font-weight-bold pt-2 text-sm">Galeri</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-4 col-sm-3 col-md-2">
                            <a href="{{ route('user.kantin') }}">
                                <div class="card mb-3 pt-3 px-3 shadow-lg text-center">
                                    <img src="{{ asset('images/icon/kantin.png') }}" alt="">
                                    <p class="font-weight-bold pt-2 text-sm">Kantin</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-4 col-sm-3 col-md-2">
                            <a href="{{ route('user.jadwal-sholat') }}">
                                <div class="card mb-3 pt-3 px-3 shadow-lg text-center">
                                    <img src="{{ asset('images/icon/jadwalsolat.png') }}" alt="">
                                    <p class="font-weight-bold pt-2 text-sm">Sholat</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-4 col-sm-3 col-md-2">
                            <a href="{{ route('user.artikel') }}">
                                <div class="card mb-3 pt-3 px-3 shadow-lg text-center">
                                    <img src="{{ asset('images/icon/artikel.png') }}" alt="">
                                    <p class="font-weight-bold pt-2 text-sm">Artikel</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-4 col-sm-3 col-md-2">
                            <a href="">
                                <div class="card mb-3 pt-3 px-3 shadow-lg text-center">
                                    <img src="{{ asset('images/icon/lainnya.png') }}" alt="">
                                    <p class="font-weight-bold pt-2 text-sm">Lainnya</p>
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
                            <p class="text-lg mb-0 text-uppercase font-weight-bolder">Artikel Terbaru</p>
                        </div>
                        <div class="col">
                            <a href="{{ route('user.artikel') }}">
                                <p class="text-sm mb-0 text-secondary text-end text-uppercase font-weight-bold">Lihat
                                    Semua ></p>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($articles as $article)
                            <div class="card my-2">
                                <a href="{{route('user.artikel.detail', $article->id)}}">
                                <div class="card-body pt-3">
                                    <div class="author align-items-center">
                                        <img src="{{asset($article->image)}}" alt="..."
                                            class="img-fluid shadow border-radius-lg w-25">
                                        <div class="name ps-3">
                                            <span>{{$article->title}}</span>
                                            <div class="stats">
                                                <small>{{$article->writer_name}}</small>
                                                <p>{{Str::limit($article->content, 50)}}</p>
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
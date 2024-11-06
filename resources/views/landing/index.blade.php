@extends('auth.base-auth')
@section('content')
    <main class="main-content  mt-0" >
        <section >
            <div class="page-header min-vh-100" style="background-image: url('{{asset('argon/assets/img/landing-bg.jpg')}}')">
                <div class="container" >
                    <div class="container text-center my-5">
                        @guest
                        @else
                        <h4 class="display-5 pb-4">Halo, {{Auth::user()->name}}!</h1>
                        @endguest
                        <h1 class="display-4 font-weight-bold pb-4">PerumKita – Portal Warga Perumahan</h1>
                        <p class="lead text-muted pb-5 px-5">PerumKita adalah aplikasi yang mempermudah warga perumahan dalam mengakses informasi dan layanan penting. Mulai dari jadwal sholat, galeri perumahan, berita, hingga pengaduan dan pemesanan makanan di kantin, semua tersedia dalam satu aplikasi. PerumKita hadir untuk menjadikan komunitas perumahan lebih terhubung dan nyaman.</p>
                        <div class="d-flex justify-content-center gap-3 my-4">
                            <a href="{{route('register')}}" class="btn btn-primary btn-lg mr-2">Get Started</a>
                            <a href="#" class="btn btn-lg btn-white">View Demos</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

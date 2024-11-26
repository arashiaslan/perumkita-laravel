@extends('layouts.base-app')
@section('content')
    <div class="card shadow-lg mx-4">
        <div class="container-fluid p-4">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <h1 class="text-center m-5">Kantin Wuenack</h1>
            <div class="row">
                @foreach ($menus as $menu)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                <a href="javascript:;" class="d-block blur-shadow-image">
                                    <img src="{{ asset($menu->image) }}" class="img-fluid border-radius-lg">
                                </a>
                            </div>
                            <div class="card-body blur justify-content-center text-center mx-4 mb-3 border-radius-md">
                                <h4 class="mb-0">{{ $menu->name }}</h4>
                                <p>Special-Recipe</p>
                                <div class="row justify-content-center text-center">
                                    <div class="col-12 mx-auto">
                                        <h5 class="text-info mb-0">Rp.{{ number_format($menu->price) }}</h5>
                                    </div>
                                </div>
                                <form action="{{ route('user.kantin.order') }}" method="post">
                                    @csrf
                                    <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                    <div class="d-flex justify-content-center mt-3">
                                        <button type="submit" class="btn bg-gradient-info">Pesan Menu</button>
                                        <input type="number" name="quantity" class="form-control ms-2" placeholder="Jumlah"
                                            min="1" max="10" value="1" style="width: 55px; height: 40px"
                                            required>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-3">
                {{ $menus->links('vendor.pagination') }}
            </div>
        </div>
    </div>
@endsection

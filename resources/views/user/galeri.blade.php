@extends('layouts.base-app')

@section('content')
    <div class="card shadow-lg mx-4">
        <div class="container-fluid py-4">
            <div class="row">
                @foreach ($galeris as $galeri)
                    <div class="col-lg-4 mb-4">
                        <div class="card text-center bg-white shadow border-radius-lg p-3">
                            <a href="javascript:;">
                                <div class="position-relative">
                                    <div class="blur-shadow-image">
                                        <img class="w-100 rounded-3 shadow-lg" src="{{ asset($galeri->image) }}" alt="Gallery Image">
                                    </div>
                                </div>
                            </a>
                            <div class="card-body">
                                <h5 class="font-weight-bolder mb-0">{{ $galeri->title }}</h5>
                                <p class="text-uppercase text-sm font-weight-bold mb-2">
                                    {{ $galeri->created_at->format('d F Y') }}
                                </p>
                                <p class="mb-0">{{ $galeri->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-3">
                {{ $galeris->links('vendor.pagination') }}
            </div>
        </div>
    </div>
@endsection

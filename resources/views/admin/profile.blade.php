@extends('layouts.base-app')
@section('content')
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="container-fluid py-4">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-profile">
                        <img src="/argon/assets/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
                        <div class="row justify-content-center">
                            <div class="col-4 col-lg-4 order-lg-2">
                                <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                    <a href="javascript:;">
                                        <img src="/argon/assets/img/team-3.jpg"
                                            class="rounded-circle img-fluid border border-2 border-white">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                            <div class="d-flex justify-content-between">
                                <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Connect</a>
                                <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i
                                        class="ni ni-collection"></i></a>
                                <a href="javascript:;"
                                    class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Message</a>
                                <a href="javascript:;" class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i
                                        class="ni ni-email-83"></i></a>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex justify-content-center">
                                        <div class="d-grid text-center">
                                            <span class="text-lg font-weight-bolder">{{Auth::user()->jumlah_istri}}</span>
                                            <span class="text-sm opacity-8">Istri</span>
                                        </div>
                                        <div class="d-grid text-center mx-4">
                                            <span class="text-lg font-weight-bolder">{{Auth::user()->jumlah_anak}}</span>
                                            <span class="text-sm opacity-8">Anak</span>
                                        </div>
                                        <div class="d-grid text-center">
                                            <span class="text-lg font-weight-bolder">1</span>
                                            <span class="text-sm opacity-8">Rumah</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <h5>
                                    {{Auth::user()->name}}
                                </h5>
                                <div class="h6 font-weight-300">
                                    <i class="ni location_pin mr-2" id="location"></i>{{Auth::user()->no_rumah}}
                                </div>
                                <div class="h6 mt-4">
                                    <i class="ni business_briefcase-24 mr-2"></i>Housing Leader - Overpower RT
                                </div>
                                <div>
                                    <i class="ni education_hat mr-2"></i>University of Homeladder
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <form action="{{ route('admin.profile.update') }}" method="post">
                            @csrf
                            @method('PUT')
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Edit Profile</p>
                                <button class="btn btn-primary btn-sm ms-auto" type="submit">Update</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Name</label>
                                        <input class="form-control" type="text" name="name" value="{{ old('name', $admin->name) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email address</label>
                                        <input class="form-control" type="email" name="email" value="{{ old('email', $admin->email) }}" required>
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Contact Information</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Address</label>
                                        <input class="form-control" type="text"
                                            value="Perumahan Makmursgt, Jl. Raya Harapan Asli." disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Blok Rumah</label>
                                        <input class="form-control" type="text" name="no_rumah" value="{{ old('no_rumah', Auth::user()->no_rumah) }}" placeholder="Blok Rumah..">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Jumlah Istri</label>
                                        <input class="form-control" type="number" name="jumlah_istri" min="1" max="10" value="{{ old('jumlah_istri', Auth::user()->jumlah_istri) }}" placeholder="Jumlah Istri..">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Jumlah Anak</label>
                                        <input class="form-control" type="number" name="jumlah_anak" min="1" max="10" value="{{ old('jumlah_anak', Auth::user()->jumlah_anak) }}" placeholder="Jumlah Anak..">
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">About me</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">About me</label>
                                        <input class="form-control" type="text"
                                            value="Seorang Pak RT yang tampan, tidak pelit, dan tidak sombong. Hobi saya membantu warga yang membutuhkan.">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

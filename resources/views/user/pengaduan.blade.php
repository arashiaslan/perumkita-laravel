@extends('layouts.base-app')
@section('content')
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="container-fluid py-4">
                <form action="{{ route('user.pengaduan.store') }}" method="POST" enctype="multipart/form-data" class="">
                    @csrf
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h2 class="my-3">Buat Pengaduan</h2>
                            <button class="btn btn-primary btn-sm ms-auto" type="submit">Kirim</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ Auth::user()->name }}" disabled>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        value="{{ Auth::user()->email }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                                placeholder="Isi Judul Pengaduan...">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="5"
                                placeholder="Isi deskripsi Pengaduan..."></textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </form>
        </div>
    </div>
@endsection

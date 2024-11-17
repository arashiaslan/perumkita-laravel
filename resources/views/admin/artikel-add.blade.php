@extends('layouts.base-app')

@section('content')
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="container-fluid py-4">
            <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                <!-- Header Form -->
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h2 class="my-3">Post Artikel</h2>
                    </div>
                </div>
                <!-- Body Form -->
                <div class="card-body">
                    <!-- Nama dan Email -->
                    <div class="row mb-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="name" class="form-label">Penulis</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ Auth::user()->name }}" disabled>
                                <input type="hidden" name="writer_name" value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ Auth::user()->email }}" disabled>
                                <input type="hidden" name="writer_email" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                    </div>
                    <!-- Upload Gambar -->
                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Upload Gambar</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" accept="image/*" required>
                        <small class="form-text text-muted">Format yang didukung: JPG, PNG, JPEG (Maks. 2MB).</small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Title -->
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Isi Judul Artikel..." required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Content -->
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Isi</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="25" placeholder="Tuliskan Artikel anda..." required></textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary btn-sm ms-auto" type="submit">Kirim</button>
                </div>
            </form>
        </div>
    </div>
@endsection

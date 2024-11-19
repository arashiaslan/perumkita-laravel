@extends('layouts.base-app')
@section('content')
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="container-fluid py-4">
                <form action="{{ route('admin.kantin.store') }}" method="POST" enctype="multipart/form-data" class="">
                    @csrf
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h2 class="my-3">Tambah Menu</h2>
                            <button class="btn btn-primary btn-sm ms-auto" type="submit">Kirim</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">Nama Menu</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Isi Nama Menu...">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="price">Harga</label>
                                    <input type="number" class="form-control" name="price" id="price"
                                        placeholder="Rp...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="image" class="form-label">Upload Gambar</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" accept="image/*" required>
                                    <small class="form-text text-muted">Format yang didukung: JPG, PNG, JPEG (Maks. 2MB).</small>
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
@endsection

@extends('layouts.base-app')

@section('content')
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="container-fluid py-4">
            <form action="{{ route('admin.kantin.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h2 class="my-3">Edit Menu</h2>
                        <button class="btn btn-primary btn-sm ms-auto" type="submit">Kirim</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Nama Menu</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $menu->name) }}" placeholder="Isi Nama Menu...">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="price">Harga</label>
                                <input type="number" class="form-control" name="price" id="price" value="{{ old('price', $menu->price) }}" placeholder="Rp...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-3">
                                <label for="image" class="form-label">Upload Gambar</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" accept="image/*">
                                <small class="form-text text-muted">Format yang didukung: JPG, PNG, JPEG (Maks. 2MB). Kosongkan jika tidak ingin mengganti gambar.</small>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="mt-3">
                                    <p>Gambar Saat Ini:</p>
                                    <img src="{{ asset($menu->image) }}" alt="Current Image" style="max-height: 400px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

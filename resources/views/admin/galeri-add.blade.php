@extends('layouts.base-app')
@section('content')
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="container-fluid py-4">
                <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="">
                    @csrf
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <h2 class="my-3">Tambah Foto</h2>
                            <button class="btn btn-primary btn-sm ms-auto" type="submit">Kirim</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control" name="title" id="name"
                                        placeholder="Isi Title...">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="date">Tanggal Upload</label>
                                    <input type="date" class="form-control" name="date" id="date" value="{{ $today }}" disabled>
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
                                <div class="form-group">
                                    <label for="preview" class="form-label">Preview Gambar</label>
                                    <img id="preview" src="#" alt="Preview Gambar" class="img-thumbnail" style="max-width: 300px; display: none;">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.getElementById('image').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const preview = document.getElementById('preview');
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block'; // Menampilkan gambar
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none'; // Sembunyikan jika tidak ada file
        }
    });
</script>
@endsection
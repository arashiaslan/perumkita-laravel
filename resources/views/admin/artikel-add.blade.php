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
                                <label for="user-select" class="form-label">Pilih Penulis</label>
                                <select class="form-control" id="user-select">
                                    <option value="" disabled selected>Pilih Penulis</option>
                                    @foreach ($writers as $writer)
                                        <option value="{{ $writer->email }}" data-name="{{ $writer->name }}">{{ $writer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="writer_email" id="email" value="{{ old('writer_email') }}" readonly>
                            </div>
                        </div>
                    </div>
                    {{-- Input Nama Penulis(Hidden) --}}
                    <input type="text" name="writer_name" id="writer_name" value="" hidden>

                    <!-- Upload Gambar -->
                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Upload Gambar</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" accept="image/*" value="{{ old('image') }}" required>
                        <small class="form-text text-muted">Format yang didukung: JPG, PNG, JPEG (Maks. 2MB).</small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Title -->
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Isi Judul Artikel..." value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Content -->
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Isi</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="25" placeholder="Tuliskan Artikel anda..." value="{{ old('content') }}" required></textarea>
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

@section('scripts')
<script>
    document.getElementById('user-select').addEventListener('change', function () {
        const selectedEmail = this.value; // Ambil nilai email dari dropdown
        const writerName = this.options[this.selectedIndex].getAttribute('data-name'); // Ambil nama penulis
        
        document.getElementById('email').value = selectedEmail; // Isi input email
        document.getElementById('writer_name').value = writerName; // Isi input tersembunyi untuk nama penulis
    });
</script>
@endsection
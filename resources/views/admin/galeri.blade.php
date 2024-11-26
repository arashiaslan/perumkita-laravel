@extends('layouts.base-app')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h6>Galeri Perumahan</h6>
                        <a href="{{ route('admin.galeri.add') }}" class="btn btn-primary text-xxs">Tambah Foto</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        @if (Session::has('status'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('status') }}
                            </div>
                        @endif
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th 
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-start ms-3">
                                            Title
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Foto</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @foreach ($galleries as $galeri)
                                        <tr>
                                            <td class="text-start ms-3">
                                                <p class="text-xs font-weight-bold mb-0 ms-3">
                                                    {{ $galeri->title }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <img src="{{ asset($galeri->image) }}" class="avatar avatar-sm me-3"
                                                    alt="user1">
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $galeri->created_at }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('admin.galeri.edit', $galeri->id) }}"
                                                    class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Edit artikel">
                                                    EDIT
                                                </a>
                                                |
                                                <form id="delete-form-{{ $galeri->id }}"
                                                    action="{{ route('admin.galeri.delete', $galeri->id) }}" method="post"
                                                    style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="javascript:void(0)"
                                                        onclick="if(confirm('Apakah Anda yakin ingin menghapus artikel ini?')) { document.getElementById('delete-form-{{ $galeri->id }}').submit(); }"
                                                        class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Delete Article">
                                                        HAPUS
                                                    </a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            {{ $galleries->links('vendor.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

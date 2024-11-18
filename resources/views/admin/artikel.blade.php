@extends('layouts.base-app')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h6>Data Warga Perumahan</h6>
                        <a href="{{route('admin.artikel.add')}}" class="btn btn-primary text-xxs">Tambah Artikel</a>
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
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            No</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Title
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Penulis</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Publish</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $article)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $loop->iteration }}</h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div>
                                                        <img src="{{ asset($article->image) }}"
                                                            class="avatar avatar-sm me-3" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="text-xs font-weight-bold mb-0 text-center">
                                                            {{ $article->title }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{$article->user?->name ?? $article->writer_name ?? 'Tidak ada nama penulis'}}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $article->created_at }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('admin.artikel.edit', $article->id) }}" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit artikel">
                                                    EDIT
                                                </a>
                                                |
                                                <form id="delete-form-{{ $article->id }}" action="{{route('admin.artikel.delete', $article->id)}}" method="post" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="javascript:void(0)"
                                                        onclick="if(confirm('Apakah Anda yakin ingin menghapus artikel ini?')) { document.getElementById('delete-form-{{ $article->id }}').submit(); }"
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
                            {{ $articles->links('vendor.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

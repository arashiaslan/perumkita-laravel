@extends('layouts.base-app')
@section('content')
    <div class="container-fluid py-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Data Pengaduan Warga</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        @if (Session::has('status'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('status') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-fixed align-items-center mb-0"
                                style="table-layout: fixed; width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Warga
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aduan
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Dikirim
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Respon
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($complaints as $complaint)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="/argon/assets/img/team-2.jpg"
                                                            class="avatar avatar-sm me-3" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">
                                                            {{ $complaint->user->name ?? $complaint->guest_name }}
                                                        </h6>
                                                        <p class="text-xs text-secondary mb-0">
                                                            {{ $complaint->user->email ?? $complaint->guest_email }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $complaint->title }}</p>
                                                <p class="text-xs text-secondary mb-0 text-truncate">
                                                    {{ Str::limit($complaint->description, 30) }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                {!! $complaint->status_badge !!}
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $complaint->created_at }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <form action="{{ route('admin.complaints.update', $complaint->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="status">Status</label>
                                                        <select name="status" id="status"
                                                            class="form-control form-control-sm w-40" required>
                                                            <option value="pending"
                                                                {{ $complaint->status == 'pending' ? 'selected' : '' }}>
                                                                Pending</option>
                                                            <option value="proses"
                                                                {{ $complaint->status == 'proses' ? 'selected' : '' }}>
                                                                Proses</option>
                                                            <option value="selesai"
                                                                {{ $complaint->status == 'selesai' ? 'selected' : '' }}>
                                                                Selesai</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit"
                                                        class="align-middle btn btn-primary btn-sm w-40">Update</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            {{ $complaints->links('vendor.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

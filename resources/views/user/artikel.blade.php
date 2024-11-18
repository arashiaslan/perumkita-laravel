@extends('layouts.base-app')
@section('content')
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="container-fluid py-4">
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-4 mt-4">
                        <div class="card card-blog card-plain">
                            <div class="position-relative">
                                <a class="d-block blur-shadow-image">
                                    <img src="{{ asset($article->image) }}" alt="img-blur-shadow"
                                        class="img-fluid shadow border-radius-lg">
                                </a>
                            </div>
                            <div class="card-body px-1 pt-3">
                                <p class="text-gradient text-primary mb-2 text-sm">
                                    {{ $article->user?->name ?? ($article->writer_name ?? 'Tidak ada nama penulis') }}</p>
                                <a href="{{ route('user.artikel.detail', $article->id) }}" style="text-decoration: none;">
                                    <h5>
                                        {{ $article->title }}
                                    </h5>
                                </a>
                                <p>
                                    {{ Str::limit($article->content, 150, '...') }}
                                </p>
                                <button type="button" class="btn btn-outline-primary btn-sm">
                                    <a href="{{ route('user.artikel.detail', $article->id) }}">Baca Artikel</a>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-3">
                {{ $articles->links('vendor.pagination') }}
            </div>
        </div>
    </div>
@endsection

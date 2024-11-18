@extends('layouts.base-app')
@section('content')
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="container-fluid py-4">
            <div class="card card-blog card-plain m-4">
                <div class="position-relative">
                    <a class="d-block blur-shadow-image">
                        <img src="{{ asset($article->image) }}" alt="img-blur-shadow"
                            class="img-fluid shadow border-radius-lg">
                    </a>
                </div>
                <div class="card-body px-0 pt-4">
                    <p class="text-gradient text-primary text-gradient font-weight-bold text-sm text-uppercase">
                        {{ $article->user?->name ?? ($article->writer_name ?? 'Tidak ada nama penulis') }}</p>
                    </p>
                    <h1 class="my-3">
                        {{ $article->title }}
                    </h1>
                    <article class="mb-3 text-lg">
                        {!! nl2br(e($article->content)) !!}
                    </article>
                    <time datetime="{{ $article->created_at }}">
                        <i>
                            {{ $article->created_at->format('d F Y') }}
                        </i>
                    </time>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.web')

@section('content')
<div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col-lg-12">
        <div class="mb-3">
            <h2 class="mb-2">{{ $berita->judul }}</h2>
            <div class="text-muted mb-2">
                <i class="far fa-calendar-alt"></i> {{ $berita->created_at->format('d M Y') }} |
                <i class="far fa-folder"></i> <a href="{{ route('web.kategori', $berita->kategori->id) }}" class="text-decoration-none">{{ $berita->kategori->nama }}</a>
                | <i class="far fa-eye"></i> <span class="text-muted">{{ number_format($berita->views ?? 0) }} views</span>
            </div>
            <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-fluid mb-4" alt="{{ $berita->judul }}">
            <div>{!! $berita->isi !!}</div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="mb-3">
        <a href="{{ route('web.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to Home</a>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <h3 class="mb-3">Comments</h3>
        @auth
        <form action="{{ route('komentar.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="mb-3">
                <label for="isi" class="form-label">Add a Comment</label>
                <textarea name="isi" id="isi" rows="3" class="form-control @error('isi') is-invalid @enderror" required></textarea>
                @error('isi')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <input type="hidden" name="berita_id" value="{{ $berita->id }}">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @else
        <div class="alert alert-warning">
            <p><a style="color: red; font-weight: bold;" href="{{ route('register') }}">Register</a>  terlebih dahulu untuk bisa komentar !!</p>
        </div>
        <div class="alert alert-warning">
            <p><a style="color: green; font-weight: bold;" href="{{ route('login') }}">Login</a>  jika sudah ada akun, untuk bisa komentar !!</p>
        </div>
        @endauth

        @if($comments->isEmpty())
        <p>Belum ada komentar.</p>
        @else
        @foreach($comments as $comment)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $comment->user->name }} <small class="text-muted">{{ $comment->created_at->format('d M Y H:i') }}</small></h5>
                <p class="card-text">{{ $comment->isi }}</p>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>

@endsection
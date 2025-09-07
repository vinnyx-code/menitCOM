@extends('layouts.web')

@section('content')
<div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col-lg-12">
        <div class="mb-3">
            <h2 class="mb-2">{{ $berita->judul }}</h2>
            <div class="text-muted mb-2">
                <i class="far fa-calendar-alt"></i> {{ $berita->created_at->format('d M Y') }} |
                <i class="far fa-folder"></i> <a href="{{ route('web.kategori', $berita->kategori->id) }}" class="text-decoration-none">{{ $berita->kategori->nama }}</a>
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
@endsection
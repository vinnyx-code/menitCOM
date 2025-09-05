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
        <!-- Komentar start -->
        <div class="comments-section mt-5">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h3 class="mb-0">Komentar</h3>
                <div></div>
            </div>

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <form action="{{ route('komentar.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="berita_id" value="{{ $berita->id }}">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="isi" class="form-label">Komentar</label>
                            <textarea class="form-control" id="isi" name="isi" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                    </form>
                </div>
            </div>

            @forelse ($berita->komentar as $komentar)
            <div class="card shadow-sm border-0 mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $komentar->nama }}</h5>
                    <p class="card-text">{{ $komentar->isi }}</p>
                </div>
            </div>
            @empty
            <div class="alert alert-info">Belum ada komentar.</div>
            @endforelse
        </div>
        <!-- Komentar end -->
    </div>
</div>
</div>
@endsection
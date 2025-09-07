@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 mt-4">
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-chart-area me-1"></i>
            Analisis - Semua Berita
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($beritaList as $b)
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $b->judul }}</h5>
                                <p class="card-text text-muted">Views: {{ number_format($b->views ?? 0) }} • Comments: {{ $b->comments_count }}</p>
                                <div class="mt-auto">
                                    <a href="{{ route('web.analisis', $b->slug) }}" class="btn btn-sm btn-primary">Lihat Analisis</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-3">{{ $beritaList->links() }}</div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.web')

@section('content')
<div class="container mt-4">

    @if(isset($berita) && $berita instanceof \App\Models\Berita)
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Analisis: {{ $berita->judul }}</h2>
            <a href="{{ route('web.show', $berita->slug) }}" class="btn btn-outline-secondary">Back to article</a>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h6 class="text-muted">Total Views</h6>
                        <h3>{{ number_format($totalViews) }}</h3>
                        <p class="small text-muted">Unique session-based views (approx)</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h6 class="text-muted">Total Comments</h6>
                        <h3>{{ $berita->comments_count }}</h3>
                        <p class="small text-muted">Comments on this article</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h6 class="text-muted">Recent Activity</h6>
                        <p class="small text-muted">Last {{ $detailedViews->count() }} viewers & {{ $recentComments->count() }} comments</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">Recent Viewers</div>
                    <div class="card-body">
                        @if($detailedViews->isEmpty())
                            <p class="text-muted">No detailed view logs yet.</p>
                        @else
                            <ul class="list-group list-group-flush">
                                @foreach($detailedViews as $v)
                                    <li class="list-group-item">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <strong>{{ $v->user_id ? 'User #' . $v->user_id : 'Guest' }}</strong>
                                                <div class="small text-muted">{{ $v->ip }} • {{ $v->created_at->format('d M Y H:i') }}</div>
                                            </div>
                                            <div class="text-muted small">{{ Str::limit($v->user_agent, 30) }}</div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">Recent Comments</div>
                    <div class="card-body">
                        @if($recentComments->isEmpty())
                            <p class="text-muted">No comments yet.</p>
                        @else
                            <ul class="list-group list-group-flush">
                                @foreach($recentComments as $c)
                                    <li class="list-group-item">
                                        <div>
                                            <strong>{{ optional($c->user)->name ?? 'Guest' }}</strong>
                                            <div class="small text-muted">{{ $c->created_at->format('d M Y H:i') }}</div>
                                            <p class="mb-0">{{ $c->isi }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    @elseif(isset($beritaList))
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Analisis - Semua Berita</h2>
        </div>

        <div class="row">
            @foreach($beritaList as $b)
                <div class="col-md-6 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $b->judul }}</h5>
                            <p class="card-text text-muted">Views: {{ number_format($b->views ?? 0) }} • Comments: {{ $b->comments_count }}</p>
                            <a href="{{ route('web.analisis', $b->slug) }}" class="btn btn-sm btn-primary">Lihat Analisis</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-3">{{ $beritaList->links() }}</div>

    @else
        <p class="text-muted">Tidak ada data analisis untuk ditampilkan.</p>
    @endif

</div>
@endsection

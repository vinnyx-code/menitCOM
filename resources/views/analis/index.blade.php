@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4 mt-4">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-chart-area me-1"></i>
                <strong>Analisis: {{ $berita->judul }}</strong>
            </div>
            <div>
                <a href="{{ route('web.show', $berita->slug) }}" class="btn btn-sm btn-outline-secondary">Back to article</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 10%">#</th>
                            <th>Metric</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Total Views</td>
                            <td>{{ number_format($totalViews) }}</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Unique Readers</td>
                            <td>{{ number_format($uniqueReaders ?? 0) }}</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Total Comments</td>
                            <td>{{ $berita->comments_count }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">Recent Viewers</div>
                <div class="card-body p-0">
                    @if($detailedViews->isEmpty())
                        <p class="p-3 text-muted">No detailed view logs yet.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Waktu</th>
                                        <th>Pengguna</th>
                                        <th>IP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($detailedViews as $v)
                                        <tr>
                                            <td>{{ $v->created_at->format('d M Y H:i') }}</td>
                                            <td>{{ $v->user_id ? 'User #' . $v->user_id : 'Guest' }}</td>
                                            <td>{{ $v->ip }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">Recent Comments</div>
                <div class="card-body p-0">
                    @if($recentComments->isEmpty())
                        <p class="p-3 text-muted">No comments yet.</p>
                    @else
                        <ul class="list-group list-group-flush">
                            @foreach($recentComments as $c)
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <strong>{{ optional($c->user)->name ?? 'Guest' }}</strong>
                                            <div class="small text-muted">{{ $c->created_at->format('d M Y H:i') }}</div>
                                            <div>{{ $c->isi }}</div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<button>
    <a href="{{ route('analis.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
</button>
@endsection

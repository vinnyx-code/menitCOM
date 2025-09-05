@extends('layouts.web')

@section('content')
<main>
    <!-- Layout: single column with Recent Articles only -->
    <div class="container-fluid p-0 mt-4">
        <div class="row mx-0">
            <div class="col-12 px-0">
                <!--  Recent Articles start -->
                <!-- Recent Articles -->
                <div class="recent-articles mt-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h3 class="mb-0">Recent Articles</h3>
                        <div></div>
                    </div>

                    <div id="recentScroll" style="width:100%; display:flex; gap:1rem; overflow-x:auto; padding-bottom:1rem; scroll-behavior:smooth;">
                        @forelse ($berita as $item)
                        @php $img = $item->gambar ? asset('storage/' . $item->gambar) : asset('assets/img/news/recent1.jpg'); @endphp
                        <div class="recent-item" style="flex:0 0 auto;">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <span class="badge bg-secondary">{{ optional($item->kategori)->nama ?? '-' }}</span>
                                    <p class="text-muted small mb-1">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</p>
                                    <h5 class="card-title"><a href="{{ route('web.show', $item->slug ?? $item->id) }}" class="text-dark">{{ $item->judul }}</a></h5>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="alert alert-info">Belum ada artikel.</div>
                        @endforelse
                    </div>

                    <style>
                        #recentScroll::-webkit-scrollbar {
                            height: 8px;
                        }

                        #recentScroll::-webkit-scrollbar-thumb {
                            background: #e0e0e0;
                            border-radius: 4px;
                        }

                        .recent-articles .card {
                            border-radius: 12px;
                            overflow: hidden;
                        }

                        .recent-articles .card-img-top {
                            height: 360px;
                            object-fit: cover;
                        }

                        /* adjust card widths to avoid large empty space at right */
                        #recentScroll > .recent-item { min-width: 40vw; max-width: 55vw; }
                        #recentScroll > .recent-item:first-child { min-width: 55vw; max-width: 65vw; }

                        @media (min-width: 1200px) {
                            #recentScroll> .recent-item { min-width: 36vw; }
                            #recentScroll> .recent-item:first-child { min-width: 52vw; }
                        }

                        @media (min-width: 992px) and (max-width:1199px) {
                            #recentScroll> .recent-item { min-width: 38vw; }
                            #recentScroll> .recent-item:first-child { min-width: 48vw; }
                        }

                        @media (max-width: 991px) {
                            #recentScroll> .recent-item { min-width: 80vw; }
                            #recentScroll> .recent-item:first-child { min-width: 86vw; }
                            .recent-articles .card-img-top { height: 200px; }
                        }

                        .recent-articles .card-body h5.card-title { font-size: 28px; font-weight: 700; margin-top: .6rem; }
                        .recent-articles .badge { padding: .35rem .6rem; border-radius: 6px; }
                    </style>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</main>

@endsection
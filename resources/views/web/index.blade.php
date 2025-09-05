@extends('layouts.web')

@section('content')
<!-- Layout: Sidebar + Main (Weekly + Recent) -->
<div class="container-fluid px-5 mt-4">
    <div class="row">
    <div class="col-lg-9">
<!--   Weekly2-News start - horizontal responsive cards -->
<div class="weekly2-news-area weekly2-pading gray-bg mt-4">
    <div class="weekly2-wrapper">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h3 class="mb-0">Weekly Top News</h3>
                <div></div>
            </div>

                <div id="weeklyScroll" style="width:100%; display:flex; gap:1rem; overflow-x:auto; padding-bottom:1rem; scroll-behavior:smooth;">
                <!-- sample cards - you can replace with dynamic loop if needed -->
                <div style="min-width: 300px; flex:0 0 auto;">
                    <div class="card shadow-sm border-0">
                        <img src="assets/img/news/weekly2News1.jpg" class="card-img-top" alt="">
                        <div class="card-body">
                            <span class="badge bg-secondary">Corporate</span>
                            <p class="text-muted small mb-1">25 Jan 2020</p>
                            <h5 class="card-title"><a href="#" class="text-dark">Welcome To The Best Model Winner Contest</a></h5>
                        </div>
                    </div>
                </div>
                <div style="min-width: 300px; flex:0 0 auto;">
                    <div class="card shadow-sm border-0">
                        <img src="assets/img/news/weekly2News2.jpg" class="card-img-top" alt="">
                        <div class="card-body">
                            <span class="badge bg-secondary">Event night</span>
                            <p class="text-muted small mb-1">25 Jan 2020</p>
                            <h5 class="card-title"><a href="#" class="text-dark">Welcome To The Best Model Winner Contest</a></h5>
                        </div>
                    </div>
                </div>
                <div style="min-width: 300px; flex:0 0 auto;">
                    <div class="card shadow-sm border-0">
                        <img src="assets/img/news/weekly2News3.jpg" class="card-img-top" alt="">
                        <div class="card-body">
                            <span class="badge bg-secondary">Corporate</span>
                            <p class="text-muted small mb-1">25 Jan 2020</p>
                            <h5 class="card-title"><a href="#" class="text-dark">Welcome To The Best Model Winner Contest</a></h5>
                        </div>
                    </div>
                </div>
                <div style="min-width: 300px; flex:0 0 auto;">
                    <div class="card shadow-sm border-0">
                        <img src="assets/img/news/weekly2News4.jpg" class="card-img-top" alt="">
                        <div class="card-body">
                            <span class="badge bg-secondary">Event time</span>
                            <p class="text-muted small mb-1">25 Jan 2020</p>
                            <h5 class="card-title"><a href="#" class="text-dark">Welcome To The Best Model Winner Contest</a></h5>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                #weeklyScroll::-webkit-scrollbar { height:8px; }
                #weeklyScroll::-webkit-scrollbar-thumb { background:#e0e0e0; border-radius:4px; }
                .weekly2-wrapper .card { border-radius:12px; overflow:hidden; }
                .weekly2-wrapper .card-img-top { height:160px; object-fit:cover; }
                @media (min-width: 992px) {
                    /* pada layar laptop, tampilkan card sedikit lebih kecil sehingga lebih banyak muat */
                    #weeklyScroll > div { min-width: 280px; }
                }
            </style>
            <!-- weekly scroll controls removed; horizontal scroll available via mouse/touch/trackpad -->
        </div>
    </div>
</div>
<!-- End Weekly-News -->
<!--  Recent Articles start -->

    <!-- Recent Articles -->
    <div class="recent-articles mt-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h3 class="mb-0">Recent Articles</h3>
                    <div></div>
                </div>

                <div id="recentScroll" style="width:100%; display:flex; gap:1rem; overflow-x:auto; padding-bottom:1rem; scroll-behavior:smooth;">
                    @forelse ($berita as $item)
                        @php $img = $item->gambar ? asset('storage/' . $item->gambar) : asset('assets/img/news/recent1.jpg'); @endphp
                        <div style="min-width:300px; flex:0 0 auto;">
                            <div class="card shadow-sm border-0">
                                <img src="{{ $img }}" class="card-img-top" alt="{{ $item->judul }}" style="height:160px; object-fit:cover;">
                                <div class="card-body">
                                    <span class="badge bg-secondary">{{ $item->kategori_id ? (\App\Models\Kategori::find($item->kategori_id)->nama ?? '-') : '-' }}</span>
                                    <p class="text-muted small mb-1">{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</p>
                                    <h5 class="card-title"><a href="#" class="text-dark">{{ $item->judul }}</a></h5>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-info">Belum ada artikel.</div>
                    @endforelse
                </div>

                <style>
                    #recentScroll::-webkit-scrollbar{ height:8px; }
                    #recentScroll::-webkit-scrollbar-thumb{ background:#e0e0e0; border-radius:4px; }
                    .recent-articles .card { border-radius:12px; overflow:hidden; }
                    .recent-articles .card-img-top { height:160px; object-fit:cover; }
                    @media (min-width: 992px) {
                        #recentScroll > div { min-width: 280px; }
                    }
                </style>

            </div>
        </div>
    <div class="col-lg-3 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white font-weight-bold">
                    Kategori
                </div>
                <ul class="list-group list-group-flush">
                    @php $kategoriList = \App\Models\Kategori::all(); @endphp
                    @foreach ($kategoriList as $kat)
                        <li class="list-group-item">
                            <a href="{{ route('web.kategori', $kat->id) }}" class="text-dark">{{ $kat->nama }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
</main>

@endsection
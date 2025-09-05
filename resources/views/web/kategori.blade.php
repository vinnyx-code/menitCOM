

@extends('layouts.web')

@section('content')
      <div class="row row-cols-1 row-cols-md-2 g-4">   
        @foreach ($berita as $item)    
  
        <div class="col mb-4">
                        <div class="card news-card h-100 animate-fade">
                            <div class="position-relative">
                                <img src="storage/{{ $item->gambar }}" class="card-img-top" alt="Pertemuan presiden dengan duta besar negara-negara ASEAN di Jakarta">
                                <span class="category-badge">{{ $item->kategori->nama }}</span>
                            </div>
                            <div class="card-body">
                                <h5 class="news-title">{{ $item->judul }}</h5>
                                <div class="news-meta">
                                    <span><i class="far fa-user"></i> {{ $item->user->name ?? 'Admin' }}</span>
                                    <span class="ms-2"><i class="far fa-calendar-alt"></i> {{ $item->created_at->format('d M Y') }}</span>
                                </div>
                                <p class="news-excerpt">{{ Str::limit(strip_tags($item->isi), 100) }}</p>
                                <a href="{{ route('web.show', $item->slug) }}" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div> 
                     @endforeach
                    </div>
                
                <!-- Load More Button -->
                <div class="text-center mt-4 mb-5">
                   {{ $berita->links('pagination::bootstrap-5')}}
                </div>
                   
@endsection

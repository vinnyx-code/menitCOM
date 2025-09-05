@extends('layouts.penulis')

@section('content')

<style>
    :root {
        --primary-color: #2c3e50;
        --secondary-color: #3498db;
        --dark-color: #34495e;
        --light-color: #ecf0f1;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
    }

    .navbar-brand {
        font-weight: 700;
        font-size: 1.8rem;
    }

    .navbar {
        background-color: var(--primary-color) !important;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .nav-link {
        font-weight: 500;
        padding: 0.5rem 1rem !important;
    }

    .hero-section {
        background-color: var(--dark-color);
        color: white;
        padding: 4rem 0;
        margin-bottom: 2rem;
        background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://placehold.co/1920x1080');
        background-size: cover;
        background-position: center;
    }

    .hero-title {
        font-size: 2.5rem;
        font-weight: 700;
    }

    .hero-subtitle {
        font-size: 1.2rem;
        margin-bottom: 2rem;
    }

    .news-card {
        transition: transform 0.3s ease;
        margin-bottom: 20px;
        height: 100%;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
        height: 200px;
        width: 100%;
        object-fit: cover;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .category-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: var(--secondary-color);
        color: white;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .news-title {
        font-weight: 700;
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
        color: var(--dark-color);
    }

    .news-meta {
        font-size: 0.9rem;
        color: #7f8c8d;
        margin-bottom: 0.5rem;
    }

    .news-excerpt {
        font-size: 0.95rem;
        color: #555;
        margin-bottom: 1rem;
    }

    .popular-posts {
        background-color: white;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        margin-bottom: 30px;
    }

    .sidebar-title {
        font-weight: 700;
        font-size: 1.2rem;
        color: var(--primary-color);
        border-bottom: 2px solid var(--secondary-color);
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    .trending-post {
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
    }

    .trending-post:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .trending-post h6 {
        font-weight: 600;
        margin-bottom: 5px;
    }

    .trending-post p {
        font-size: 0.8rem;
        color: #7f8c8d;
        margin-bottom: 0;
    }

    .categories-list {
        list-style: none;
        padding-left: 0;
    }

    .categories-list li {
        margin-bottom: 10px;
    }

    .categories-list a {
        color: #555;
        text-decoration: none;
        transition: color 0.3s ease;
        display: block;
        padding: 8px 10px;
        background-color: #f8f9fa;
        border-radius: 4px;
    }

    .categories-list a:hover {
        color: var(--secondary-color);
        background-color: #e9ecef;
    }

    .categories-list i {
        margin-right: 8px;
        color: var(--secondary-color);
    }

    .footer {
        background-color: var(--primary-color);
        color: white;
        padding: 3rem 0;
        margin-top: 3rem;
    }

    .footer-title {
        font-weight: 700;
        margin-bottom: 1.5rem;
    }

    .footer-links {
        list-style: none;
        padding-left: 0;
    }

    .footer-links li {
        margin-bottom: 0.8rem;
    }

    .footer-links a {
        color: var(--light-color);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-links a:hover {
        color: var(--secondary-color);
    }

    .social-icons a {
        display: inline-block;
        width: 40px;
        height: 40px;
        background-color: rgba(255, 255, 255, 0.1);
        color: white;
        border-radius: 50%;
        text-align: center;
        line-height: 40px;
        margin-right: 10px;
        transition: all 0.3s ease;
    }

    .social-icons a:hover {
        background-color: var(--secondary-color);
        transform: translateY(-3px);
    }

    .copyright {
        background-color: rgba(0, 0, 0, 0.1);
        padding: 1rem 0;
        font-size: 0.9rem;
        text-align: center;
    }

    .search-box {
        position: relative;
        margin-bottom: 20px;
    }

    .search-box input {
        padding-right: 40px;
        border-radius: 20px;
    }

    .search-box button {
        position: absolute;
        right: 5px;
        top: 5px;
        background: var(--secondary-color);
        border: none;
        color: white;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        padding: 0;
    }

    @media (max-width: 767.98px) {
        .hero-title {
            font-size: 2rem;
        }

        .hero-subtitle {
            font-size: 1rem;
        }

        .navbar-brand {
            font-size: 1.4rem;
        }
    }

    /* Animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade {
        animation: fadeIn 0.5s ease forwards;
    }

    .delay-1 {
        animation-delay: 0.2s;
    }

    .delay-2 {
        animation-delay: 0.4s;
    }

    .delay-3 {
        animation-delay: 0.6s;
    }
</style>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
            <a href="{{ route('penulis.berita.create') }}" class="btn btn-sm btn-primary">+ Tambah Berita</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($berita as $b)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $b->judul }}</td>
                            <td>{{ $b->kategori->nama }}</td>
                            <td>
                                <a href="{{ route('penulis.berita.edit', $b->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form method="POST" action="{{ route('penulis.berita.destroy', $b->id) }}" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Hapus?')" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
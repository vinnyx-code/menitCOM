@extends('layouts.admin')
@section('content')

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 mb-4">Data Kategori</h1>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between">
                                <h5>Daftar Kategori</h5>
                                <a href="{{ route('kategori.create') }}" class="btn btn-sm btn-primary">+ Tambah Kategori</a>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($kategori as $k)
                                        <tr>
                                            <td>{{($loop->iteration)}}</td>
                                            <td>{{ $k->nama }}</td>
                                            <td>
                                                <a href="{{ route('kategori.edit', $k) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('kategori.destroy', $k) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Apakah anda yakin?')" type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
              
@endsection
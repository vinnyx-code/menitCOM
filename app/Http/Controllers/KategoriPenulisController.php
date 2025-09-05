<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori;

class KategoriPenulisController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('penulis.kategori.index', compact('kategori'));
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'isi' => 'required|string|max:500',
            'berita_id' => 'required|exists:beritas,id',
        ]);

        Comment::create([
            'isi' => $request->isi,
            'berita_id' => $request->berita_id,
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }
}

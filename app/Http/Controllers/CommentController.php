<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Berita;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'isi' => 'required|string|max:1000',
            'berita_id' => 'required|exists:beritas,id',
        ]);

        // Save to columns defined in migration: 'comment' and 'beritas_id'
        Comment::create([
            'comment' => $request->isi,
            'beritas_id' => $request->berita_id,
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }

    public function comments($id)
    {
        $berita = Berita::find($id);

        if (!$berita) {
            abort(404, 'Berita tidak ditemukan');
        }

        $comments = $berita->comments()->latest()->get();

        return view('web.comments', compact('berita', 'comments'));
    }
}

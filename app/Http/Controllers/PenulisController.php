<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\DB;

class PenulisController extends Controller
{
    public function dashboard()
    {
        $userId = auth()->id();
        $myArticles = Berita::where('user_id', $userId)->withCount('comments')->orderByDesc('views')->get();
        $summary = [
            'total_articles' => $myArticles->count(),
            'total_views' => $myArticles->sum('views'),
            'total_comments' => $myArticles->sum('comments_count'),
        ];
        return view('penulis.dashboard', compact('myArticles','summary'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\BeritaView;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    //
    public function index()
    {
        $berita = Berita::all();
        return view('web.index', compact('berita'));
    }

    public function show($slug)
    {
         $berita = Berita::with(['comments.user','kategori'])->where('slug', $slug)->firstOrFail();
        $comments = $berita->comments ?? collect();

        // simple session-based view counting: only increment once per session per article
        $viewKey = 'viewed_berita_' . $berita->id;
        if (!session()->has($viewKey)) {
            $berita->incrementViews();
            // Log detailed view record for analytics
            try {
                BeritaView::create([
                    'berita_id' => $berita->id,
                    'user_id' => auth()->id(),
                    'session_id' => session()->getId(),
                    'ip' => request()->ip(),
                    'user_agent' => substr(request()->userAgent() ?? '', 0, 500),
                ]);
            } catch (\Throwable $e) {
                // ignore logging failures to avoid breaking page view
            }

            session()->put($viewKey, true);
        }

        return view('web.show', compact('berita', 'comments'));
    }

    public function kategori($id)
    {
         $berita = Berita::where('kategori_id',$id)->paginate(4);
        return view('web.kategori', compact('berita'));
    }

    public function analisis($slug)
    {
        $berita = Berita::withCount('comments')->where('slug', $slug)->firstOrFail();

        // total views from counter and detailed logs
        $totalViews = $berita->views ?? 0;
        $detailedViews = BeritaView::where('berita_id', $berita->id)->latest()->limit(20)->get();

        // recent comments
        $recentComments = $berita->comments()->latest()->limit(20)->get();

        return view('analis.index', compact('berita','totalViews','detailedViews','recentComments'));
    }

    // list/index of analyses
    public function analisisIndex()
    {
        $beritaList = Berita::withCount('comments')->latest()->paginate(10);
        return view('analis.index', compact('beritaList'));
    }
}

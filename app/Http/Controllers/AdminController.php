<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        // top articles by views
        $topArticles = Berita::withCount('comments')->orderByDesc('views')->limit(10)->get();

        $summary = [
            'total_articles' => Berita::count(),
            'total_views' => Berita::sum('views'),
            'total_comments' => DB::table('comments')->count(),
        ];

        return view('admin.dashboard', compact('topArticles', 'summary'));
    }
}

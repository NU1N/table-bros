<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = News::available()
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('news', [
            'news' => $news,
        ]);
    }

    public function show(string $slug): View
    {
        $post = News::where('slug', $slug)->available()->firstOrFail();

        return view('news-post', [
            'post' => $post,
        ]);
    }
}

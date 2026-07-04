<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Party;
use Illuminate\View\View;

class LandingController extends Controller
{
    public function __invoke(): View
    {
        $partiesToday = Party::whereDate('datetime', now())
            ->available()
            ->orderBy('datetime', 'asc')
            ->get();

        $news = News::available()
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('landing', [
            'partiesToday' => $partiesToday,
            'news' => $news,
        ]);
    }
}

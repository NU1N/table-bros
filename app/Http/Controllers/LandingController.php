<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class LandingController extends Controller
{
    public function __invoke(): View
    {
        $gamesToday = $this->gamesToday();
        $communityNews = $this->communityNews();

        return view('landing', [
            'gamesToday' => $gamesToday,
            'communityNews' => $communityNews,
        ]);
    }

    private function gamesToday(): Collection
    {
        return Party::whereDate('datetime', now())
            ->available()
            ->orderBy('datetime', 'asc')
            ->get();
    }

    private function communityNews(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Новое поступление: Gloomhaven',
                'slug' => 'gloomy-haven',
                'excerpt' => 'В нашей игротеке появилось долгожданное дополнение к легендарной кампании. Готовьтесь к ещё более захватывающим приключениям!',
                'date' => '24.04.2026',
                'time' => '19:00',
                'image' => asset('default/images/party-preview.png'),
            ],
            [
                'id' => 2,
                'title' => 'Отчёт с турнира по Warcraft Adventures',
                'slug' => 'gloomy-haven',
                'excerpt' => 'Прошло уже три недели, но эмоции от последнего турнира до сих пор не дают нам спать. Делимся фотографиями и результатами.',
                'date' => '20.04.2026',
                'time' => '15:00',
                'image' => asset('default/images/party-preview.png'),
            ],
        ];
    }
}

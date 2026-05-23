<?php

namespace App\Http\Controllers;

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

    private function gamesToday(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Мрачная гавань',
                'slug' => 'gloomy-harbor',
                'game' => 'D&D 5E',
                'date' => '26.04.2026',
                'time' => '19:00',
                'price' => '500 ₽',
                'description' => 'Огромное кооперативное приключение. Ищем опытных наемников для прохождения кампании.',
                'host' => 'DungeonMaster',
                'hostAvatar' => asset('default/images/avatar.png'),
                'avatar' => asset('default/images/avatar.png'),
                'spots' => 4,
                'maxSpots' => 4,
                'full' => true,
            ],
            [
                'id' => 2,
                'title' => 'Кодовое имя: Спринтер',
                'slug' => 'codename-sprinter',
                'game' => 'Codenames',
                'date' => '27.04.2026',
                'time' => '18:00',
                'price' => '300 ₽',
                'description' => 'Классическая командная игра на ассоциации. Отлично подходит для новичков и опытных игроков.',
                'host' => 'GameMaster',
                'hostAvatar' => asset('default/images/avatar.png'),
                'avatar' => asset('default/images/avatar.png'),
                'spots' => 2,
                'maxSpots' => 6,
                'full' => false,
            ],
            [
                'id' => 3,
                'title' => 'Гвинт: Турнир',
                'slug' => 'gwent-tournament',
                'game' => 'Gwent',
                'date' => '28.04.2026',
                'time' => '20:00',
                'price' => '400 ₽',
                'description' => 'Еженедельный турнир по Гвенту. Принесите свои колоды и сразитесь за призы!',
                'host' => 'CardKing',
                'hostAvatar' => asset('default/images/avatar.png'),
                'avatar' => asset('default/images/avatar.png'),
                'spots' => 6,
                'maxSpots' => 8,
                'full' => false,
            ],
        ];
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

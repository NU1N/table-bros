<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = $this->news();

        return view('news', [
            'news' => $news,
        ]);
    }

    public function show(string $slug): View
    {
        $post = $this->findPost($slug);

        return view('news-post', [
            'post' => $post,
        ]);
    }

    private function news(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Новое поступление: Gloomhaven',
                'slug' => 'gloomhaven-arrival',
                'excerpt' => 'В нашей игротеке появилось долгожданное дополнение к легендарной кампании. Готовьтесь к ещё более захватывающим приключениям!',
                'date' => '24.04.2026',
                'time' => '19:00',
                'image' => asset('default/images/news-preview.png'),
                'content' => 'В нашей игротеке появилось долгожданное дополнение к легендарной кампании. Готовьтесь к ещё более захватывающим приключениям! Мы ожидаем поставку уже на следующей неделе, и как только коробки появятся на полках — мы сразу сообщим вам подробности. Следите за обновлениями!',
            ],
            [
                'id' => 2,
                'title' => 'Отчёт с турнира по Warcraft Adventures',
                'slug' => 'warcraft-tournament-report',
                'excerpt' => 'Прошло уже три недели, но эмоции от последнего турнира до сих пор не дают нам спать. Делимся фотографиями и результатами.',
                'date' => '20.04.2026',
                'time' => '15:00',
                'image' => asset('default/images/news-preview.png'),
                'content' => 'Прошло уже три недели, но эмоции от последнего турнира до сих пор не дают нам спать. Делимся фотографиями и результатами. Первое место занял игрок под ником DragonSlayer, который прошёл все 12 уровней без единой смерти. Поздравляем!',
            ],
            [
                'id' => 3,
                'title' => 'Советы для новичков: как начать играть',
                'slug' => 'beginners-guide',
                'excerpt' => 'Вы всегда хотели попробовать настольные игры, но не знали с чего начать? Мы подготовили подробный гайд для новичков.',
                'date' => '15.04.2026',
                'time' => '12:00',
                'image' => asset('default/images/news-preview.png'),
                'content' => 'Вы всегда хотели попробовать настольные игры, но не знали с чего начать? Мы подготовили подробный гайд для новичков. В этой статье мы расскажем о базовых правилах этикета, популярных играх для старта и наших ближайших открытых вечерах.',
            ],
            [
                'id' => 4,
                'title' => 'Расписание на майские праздники',
                'slug' => 'may-holidays-schedule',
                'excerpt' => 'Готовим для вас насыщенную программу на майские каникулы. Ждём всех желающих!',
                'date' => '10.04.2026',
                'time' => '10:00',
                'image' => asset('default/images/news-preview.png'),
                'content' => 'Готовим для вас насыщенную программу на майские каникулы. Ждём всех желающих! Будут и мастер-классы, и турниры, и специальные гостевые вечера. Подробности уже скоро!',
            ],
            [
                'id' => 5,
                'title' => 'Пополнение коллекций: новые стратегии',
                'slug' => 'new-strategy-games',
                'excerpt' => 'Три новые стратегические игры уже ждут вас в игротеке. Узнайте подробности!',
                'date' => '05.04.2026',
                'time' => '09:00',
                'image' => asset('default/images/news-preview.png'),
                'content' => 'Три новые стратегические игры уже ждут вас в игротеке. Узнайте подробности! Among Us на настольке, кооперативный Pandemic Legacy и эпический Twilight Imperium — всё это теперь доступно для наших гостей.',
            ],
        ];
    }

    private function findPost(string $slug): array
    {
        $news = $this->news();

        foreach ($news as $post) {
            if ($post['slug'] === $slug) {
                return $post;
            }
        }

        abort(404);
    }
}

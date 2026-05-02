<x-layout title="Мрачная гавань (Gloomhaven)">
    <div class="max-w-screen-xl mx-auto p-4">

        <main class="max-w-screen-xl mx-auto p-4 lg:p-8" x-data="{ joined: false, count: 1, max: 4 }">

            <nav class="mb-8">
                <a href="{{ route('parties') }}"
                    class="inline-flex items-center text-sm font-bold text-primary hover:underline uppercase tracking-wider">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M15 19l-7-7 7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Назад к партиям
                </a>

            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-8">
                    <div
                        class="rounded-3xl overflow-hidden border  bg-secondary bg-cover bg-center border-secondary-light shadow-sm">
                        <img class="w-full h-64 lg:h-96 object-cover"
                            src="{{ asset('default/images/party-preview.png') }}">
                        <div class="p-6 lg:p-8">
                            <div class="flex justify-between items-start mb-2">
                                <span
                                    class="text-[px] font-bold px-2 py-0.5 rounded-full uppercase bg-white text-primary-dark">
                                    D&D 5E
                                </span>
                            </div>

                            <h1 class="text-3xl lg:text-4xl font-extrabold text-primary mb-4 uppercase">
                                Мрачная гавань (Gloomhaven)
                            </h1>

                            <x-sharing />
                            <div class="mt-4">
                                <p class="text-white leading-relaxed text-lg">
                                    Сценарий #4. Нам очень нужен танк, иначе нас разнесут в первой же комнате!
                                    Играем с использованием планшетов для трекинга ХП. Новичкам поможем, но
                                    приготовьтесь
                                    много
                                    думать.
                                    Берите с собой хорошее настроение и что-нибудь к чаю.
                                </p>

                                <p class="text-white leading-relaxed text-lg">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum voluptate adipisci
                                    laboriosam quam, nemo, sequi placeat dolore explicabo eos itaque maxime dolores
                                    necessitatibus deleniti sint provident accusantium ut distinctio dicta sunt expedita
                                    harum debitis labore doloribus animi! Illum provident quae in sed, dignissimos
                                    tenetur
                                    aperiam optio, vero veniam, officiis quaerat sit incidunt repellat! Consectetur
                                    quisquam
                                    quia vitae consequatur sint officia quasi, reiciendis vel quos aperiam voluptatem
                                    dolore
                                    quas iusto! Aut architecto inventore saepe! Quas, necessitatibus vitae harum
                                    voluptatum
                                    consequatur facilis, officia dignissimos assumenda numquam unde impedit atque porro
                                    perspiciatis minus. Accusantium error ratione nobis. Ipsam quaerat repellat error
                                    provident. Quas!
                                </p>
                            </div>


                        </div>


                    </div>


                </div>

                <div class="space-y-6">

                    <div
                        class="p-6 lg:p-8 rounded-3xl border bg-secondary border-secondary-light lg:sticky top-25 z-50">
                        <div class="space-y-4 mb-6">
                            <div class="flex items-center text-white">
                                <svg class="w-5 h-5 mr-3 text-primary" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        stroke-width="2" />
                                </svg>
                                <span class="font-medium">24 апреля, Пятница</span>
                            </div>
                            <div class="flex items-center text-white">
                                <svg class="w-5 h-5 mr-3 text-primary" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2" />
                                </svg>
                                <span class="font-medium">19:00 (около 4 ч)</span>
                            </div>
                            <div class="flex items-center text-white">
                                <svg class="w-5 h-5 text-primary mr-3" aria-hidden="true" xmlns="http://w3.org"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>

                                <span class="font-medium">500 ₽</span>
                            </div>
                        </div>
                        <div
                            class="flex items-center gap-3 p-3 my-5 border-white/30 rounded-2xl border border-secondary-light bg-secondary-medium backdrop-blur-md">
                            <img class="w-10 h-10 rounded-full object-cover"
                                src="{{ asset('default/images/avatar.png') }}">
                            <div>
                                <p class="text-sm font-bold text-white ">
                                    DungeonMaster
                                </p>
                                <p class="text-[10px] text-primary uppercase font-bold">Ведущий</p>
                            </div>

                        </div>

                        <button @click="joined = !joined"
                            :class="joined ? 'bg-red-700 text-white hover:bg-red-800 border-red-200' : 'bg-primary text-secondary hover:bg-primary-dark'"
                            class="w-full py-4 rounded-2xl font-bold transition-all flex items-center justify-center gap-2 cursor-pointer">

                            <template x-if="!joined">
                                <span class="flex items-center gap-2">
                                    Учавствовать
                                </span>
                            </template>

                            <template x-if="joined">
                                <span class="flex items-center gap-2">
                                    Отменить запись
                                </span>
                            </template>
                        </button>

                        <h3 class="text-xl font-bold text-white my-3 flex items-center">
                            Участники
                            <span class="ml-3 text-sm font-medium text-white"
                                x-text="`${joined ? count + 1 : count} / ${max}`"></span>
                        </h3>
                        <div class="grid grid-cols-1  gap-4">

                            <div class="flex items-center gap-3">
                                <img class="w-10 h-10 rounded-full object-cover"
                                    src="{{ asset('default/images/avatar.png') }}">
                                <p class="text-sm font-medium text-white">Ivan_The_Great</p>
                            </div>
                            <template x-if="joined">
                                <div class="flex items-center gap-3" x-transition>
                                    <img class="w-10 h-10 rounded-full object-cover"
                                        src="{{ asset('default/images/avatar.png') }}">
                                    <p class="text-sm font-bold text-green-500">Вы идете!</p>
                                </div>
                            </template>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>
</x-layout>
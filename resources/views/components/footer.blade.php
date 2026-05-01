<footer class="border-t  bg-gray-800 border-gray-700 mt-20">
    <div class="max-w-screen-xl mx-auto p-8 md:py-10">
        <div class="flex flex-col md:flex-row justify-between items-center gap-8">

            <!-- Лого и Копирайт -->
            <div class="text-center md:text-left">
                <x-logo />
                <p class="text-sm text-gray-400 mt-4">
                    © {{ date('Y') }}. <br class="md:hidden"> Сделано с любовью к кубам.
                </p>
            </div>

            <nav>
                <ul class="flex flex-wrap justify-center gap-6 md:gap-10 text-sm font-medium text-gray-400">
                    <li>
                        <a href="{{ route('parties') }}" class="hover:text-blue-600 transition-colors">Расписание
                            партий</a>
                    </li>
                    <li>
                        <a href="{{ route('news') }}" class="hover:text-blue-600 transition-colors">Новости</a>
                    </li>
                    <li>
                        <a href="{{ route('privacy') }}"
                            class="hover:text-blue-600 transition-colors">Конфиденциальность</a>
                    </li>
                    <li>
                        <a href="mailto:[EMAIL АДМИНИСТРАТОРА]"
                            class="hover:text-blue-600 transition-colors text-blue-500">Поддержка</a>
                    </li>
                </ul>
            </nav>
        </div>

        <hr class="my-8 border-gray-700">
        <div class="text-center">
            <p class="text-[10px] text-gray-400 uppercase tracking-[0.2em]">
                Сервис не является публичной офертой. Все права на игры принадлежат их издателям.
            </p>
        </div>
    </div>
</footer>
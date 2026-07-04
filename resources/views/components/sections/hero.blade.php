<section
    class="relative overflow-hidden bg-[url(/default/images/bg-image.png)] bg-cover bg-center pt-16 pb-20 lg:pt-30 lg:pb-40">
    <div class="max-w-screen-xl mx-auto px-4 flex flex-col lg:flex-row items-center gap-12">
        <div class="flex-1 text-center lg:text-left z-10">
            <span
                class="inline-block bg-white text-primary-dark text-xs font-black uppercase tracking-widest px-4 py-1.5 rounded-full mb-6">
                Бросай кубики, а не друзей
            </span>
            <h1 class="text-5xl lg:text-7xl font-black text-white uppercase tracking-tighter mb-8">
                Найди свою идеальную <span class="text-primary">партию</span>
            </h1>
            <p class="text-xl text-white mb-10 leading-relaxed max-w-2xl mx-auto lg:mx-0">
                Больше никаких долгих переписок в чатах — выбирай игру и приходи побеждать.
            </p>
            <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4">
                <a href="{{ route('parties') }}"
                    class="px-8 py-5 bg-primary text-secondary font-black uppercase tracking-widest rounded-2xl hover:scale-105 transition-transform shadow-xl">
                    Смотреть расписание
                </a>
                @if(!auth()->id())
                    <button @click="loginModal = true"
                        class="px-8 py-5 bg-white  cursor-pointer  text-primary-dark font-black uppercase hover:scale-105  tracking-widest rounded-2xl  transition-transfor">
                        Присоединиться
                    </button>
                @endif
            </div>
        </div>
    </div>
</section>

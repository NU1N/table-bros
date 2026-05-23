<section class="py-24 bg-secondary-light">
    <div class="max-w-screen-xl mx-auto px-4">

        <div class="flex flex-col md:flex-row items-center justify-between mb-16 gap-4">
            <div class="text-center md:text-left">
                <h2 class="text-3xl lg:text-5xl font-black uppercase tracking-tighter text-white mb-4">Наши
                    мастера</h2>
                <p class="text-white max-w-xl">Те, кто знает правила за вас, объяснит нюансы и
                    сделает каждую партию незабываемой.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <div class="group relative ">
                <div class="relative overflow-hidden rounded-[2.5rem] aspect-[3/4]">
                    <img src="{{ asset('default/images/party-preview.png') }}"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                        alt="Master">
                    <div class="absolute bottom-4 left-4 right-4">
                        <div class="bg-white backdrop-blur-md p-4 rounded-2xl shadow-xl">
                            <h4 class="text-lg font-black text-primary-dark uppercase mb-1">Артём</h4>
                            <p class="text-[12px] font-bold uppercase tracking-widest mb-2">RPG &
                                Storytelling</p>
                            <div class="flex gap-1 text-[12px] font-bold ">Партий: 150+</div>
                        </div>
                    </div>
                </div>
                <p
                    class="mt-4 text-sm text-white px-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    Мастер подземелий. Проведет вас через любые миры D&D и Pathfinder.
                </p>
            </div>
        </div>
    </div>
</section>

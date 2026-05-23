<section class="py-24 bg-secondary overflow-hidden">
    <div class="max-w-screen-xl mx-auto px-4">

        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-5xl font-black uppercase tracking-tighter text-white mb-4">Атмосфера
                нашего клуба</h2>
            <div class="h-1.5 w-24 bg-primary mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 grid-rows-2 gap-4 h-[500px] md:h-[700px]">
            <div class="col-span-2 row-span-2 relative group overflow-hidden rounded-[2rem]">
                <img src="{{ asset('default/images/party-preview.png') }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                    alt="Игротека">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-8">
                    <span class="text-white font-bold uppercase tracking-widest">Вечерние посиделки</span>
                </div>
            </div>

            <div class="col-span-2 row-span-1 relative group overflow-hidden rounded-[2rem]">
                <img src="{{ asset('default/images/party-preview.png') }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                    alt="Настолки">
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
                    <span class="text-white font-bold uppercase tracking-widest">Накал страстей</span>
                </div>
            </div>

            <div class="col-span-1 row-span-1 relative group overflow-hidden rounded-[2rem]">
                <img src="{{ asset('default/images/party-preview.png') }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                    alt="Миниатюры">
            </div>

            <div class="col-span-1 row-span-1 relative group overflow-hidden rounded-[2rem]">
                <img src="{{ asset('default/images/party-preview.png') }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                    alt="Карты">
            </div>

        </div>
    </div>
</section>

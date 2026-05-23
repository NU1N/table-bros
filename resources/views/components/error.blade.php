<main class="min-h-screen flex items-center justify-center px-4">
    <div class="text-center max-w-lg">
        <div class="relative mb-8">
                <span class="text-[120px] lg:text-[160px] font-black text-primary leading-none tracking-tighter">
                    {{ $code}}
                </span>
        </div>

        <h1 class="text-2xl lg:text-3xl font-black text-white uppercase tracking-tighter mb-8">
            {{ $title }}
        </h1>

        <a href="{{ route('landing') }}"
           class="inline-flex items-center gap-2 bg-primary text-secondary font-bold py-4 px-8 rounded-2xl hover:bg-primary-dark transition-all uppercase tracking-wider">
            На главную
        </a>
    </div>
</main>

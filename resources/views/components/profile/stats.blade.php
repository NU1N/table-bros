<div class="grid grid-cols-2 gap-4">
    @foreach($stats as $stat)
        <div class="p-4 rounded-2xl border bg-secondary border-secondary-light shadow-sm">
            <p class="text-[10px] font-black text-white uppercase tracking-widest mb-1">{{ $stat['label'] }}</p>
            <p class="text-2xl font-black text-primary">{{ $stat['value'] }}</p>
        </div>
    @endforeach
</div>

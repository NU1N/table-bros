<form action="/profile" method="POST" enctype="multipart/form-data"
    x-data="{ photoPreview: null }">
    <div class="rounded-3xl border bg-secondary border-secondary-light overflow-hidden">
        <div class="h-24 bg-gradient-to-r from-primary-light to-primary-dark"></div>
        <div class="p-6 -mt-12 text-center">
            <div class="relative inline-block mb-4">
                <img class="w-24 h-24 rounded-full border-4 border-gray-800 shadow-md object-cover"
                    :src="photoPreview ? photoPreview :  '{{ $user->avatar_url }}'" alt="Аватар">
                <label
                    class="absolute bottom-0 right-0 p-1.5 bg-white rounded-full border  cursor-pointer  bg-gray-700 border-gray-600 hover:bg-gray-100">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <input type="file" name="avatar" class="hidden" @change="
                        const file = $event.target.files[0];
                        const reader = new FileReader();
                        reader.onload = (e) => { photoPreview = e.target.result; };
                        reader.readAsDataURL(file);
                    ">
                </label>
            </div>


            <div class="space-y-6 text-left">
                <div class="mt-3">
                    <label for="name"
                        class="block mb-2 text-sm font-bold text-white uppercase tracking-wider">
                        Имя
                    </label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-400 font-bold">
                            @
                        </div>
                        <input type="text" id="name" name="name" value="{{$user->name}}"
                            class="border  text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-3 bg-gray-700 border-gray-600 placeholder-gray-400 text-white"
                            placeholder="Введите ник" required>
                    </div>
                    <p class="mt-2 text-xs text-white">
                        Это имя будут видеть другие игроки в списке участников.
                    </p>
                </div>

            </div>
            <div class="mt-6 space-y-2">
                <button type="submit"
                    class="w-full text-secondary cursor-pointer bg-primary hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-2xl text-sm px-5 py-4 text-center transition-all">
                    Сохранить изменения
                </button>
            </div>
        </div>
    </div>
</form>

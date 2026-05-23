<x-layout title="Мой профиль">
    <div class="max-w-screen-xl mx-auto p-4">
        <main class="max-w-screen-xl mx-auto p-4 lg:p-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <div class="lg:col-span-4 space-y-6">
                    <x-profile.avatar-form :user="$user" />
                    <x-profile.stats :stats="$stats" />
                </div>
                <div class="lg:col-span-8 space-y-6">
                    <x-profile.registrations :registrations="$registrations" />
                </div>
            </div>
        </main>
    </div>
</x-layout>

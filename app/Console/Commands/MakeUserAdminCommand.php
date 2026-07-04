<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('user:make-admin {email}')]
#[Description('Назначить пользователя администратором по его email')]
class MakeUserAdminCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $email = $this->argument('email');
        $user = User::where('email', $email)->first();
        if (! $user) {
            $this->error("Пользователь с email '{$email}' не найден.");
            return static::FAILURE;
        }
        if ($user->is_admin) {
            $this->info("Пользователь {$user->name} уже является администратором.");
            return static::SUCCESS;
        }
        $user->is_admin = true;
        $user->save();
        $this->info("Успех! Пользователь {$user->name} теперь имеет права администратора.");

        return static::SUCCESS;
    }
}

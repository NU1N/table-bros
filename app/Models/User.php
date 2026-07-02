<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'socialite_provider', 'socialite_provider_id', 'is_admin', 'is_master'])]
#[Hidden(['password', 'remember_token', 'socialite_provider_id'])]
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
            'is_master' => 'boolean',
        ];
    }

    public function parties(): BelongsToMany
    {
        return $this->belongsToMany(Party::class, 'user_party');
    }
}

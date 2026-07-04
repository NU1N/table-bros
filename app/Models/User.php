<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

#[Fillable(['name', 'email', 'password', 'socialite_provider', 'socialite_provider_id', 'is_admin', 'is_master'])]
#[Hidden(['password', 'remember_token', 'socialite_provider_id'])]
class User extends Authenticatable implements HasMedia , FilamentUser
{
    use HasFactory, Notifiable;
    use InteractsWithMedia;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
            'is_master' => 'boolean',
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')->singleFile();
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->is_admin;
    }

    public function parties(): BelongsToMany
    {
        return $this->belongsToMany(Party::class, 'user_party');
    }

    public function completeParties(): BelongsToMany
    {
        return $this->parties()->whereIsCompleted(true);
    }

    public function registrations(): BelongsToMany
    {
        return $this->parties()->available();
    }

    public function avatarUrl(): Attribute {
        return Attribute::make(
            get: fn () => $this->getFirstMediaUrl('avatar')
                ? $this->getFirstMediaUrl('avatar')
                : asset('default/images/avatar.png'),
        );
    }
}

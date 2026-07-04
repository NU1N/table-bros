<?php

namespace App\Models;

use App\Traits\ModelHasPreviewImage;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Party extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use ModelHasPreviewImage;

    protected $fillable = [
        'title',
        'slug',
        'tags',
        'is_completed',
        'is_hidden',
        'master_id',
        'price',
        'spots',
        'datetime',
        'duration',
        'address',
        'description',
        'short_description',
    ];

    protected function casts(): array
    {
        return [
            'datetime' => 'datetime',
            'spots' => 'integer',
            'tags' => 'array',
        ];
    }

    public function master(): BelongsTo
    {
        return $this->belongsTo(User::class, 'master_id')->where('is_master', true);
    }

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_party');
    }

    public function spotsRemaining(): Attribute {
        return Attribute::make(
            get: fn () => max(0, $this->spots - $this->participants()->count()),
        );
    }

    #[Scope]
    protected function available(Builder $query): Builder
    {
        return $query->whereIsHidden(false)->whereIsCompleted(false);
    }
}

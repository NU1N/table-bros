<?php

namespace App\Models;

use App\Traits\ModelHasPreviewImage;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class News extends Model implements HasMedia
{
    use InteractsWithMedia;
    use ModelHasPreviewImage;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'is_hidden',
    ];

    protected function casts(): array
    {
        return [
            'is_hidden' => 'boolean',
        ];
    }

    #[Scope]
    protected function available(Builder $query): Builder
    {
        return $query->whereIsHidden(false);
    }
}

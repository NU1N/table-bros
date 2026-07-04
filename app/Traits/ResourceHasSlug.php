<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait ResourceHasSlug
{
    protected function slugifyRecordTitle(array $recordData): array
    {
        $baseSlug = Str::slug($recordData[static::$resource::getRecordTitleAttribute()]);
        $slugHash = Str::lower(Str::random(5));
        $slug = $baseSlug.'-'.$slugHash;
        while (static::$resource::getModel()::where('slug', $slug)->exists()) {
            $slugHash = Str::lower(Str::random(5));
            $slug = $baseSlug.'-'.$slugHash;
        }
        $recordData['slug'] = $slug;

        return $recordData;
    }
}

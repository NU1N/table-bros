<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait ModelHasPreviewImage
{
    public function previewImageUrl(): Attribute {
        return Attribute::make(
            get: fn () => $this->getFirstMediaUrl('preview_image')
                ? $this->getFirstMediaUrl('preview_image')
                : asset('default/images/party-preview.png'),
        );
    }
}

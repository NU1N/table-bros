<?php

namespace App\Filament\Resources\News\Pages;

use App\Filament\Resources\News\NewsResource;
use App\Traits\ResourceHasSlug;
use Filament\Resources\Pages\CreateRecord;

class CreateNews extends CreateRecord
{
    use ResourceHasSlug;

    protected static string $resource = NewsResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $this->slugifyRecordTitle($data);
    }
}

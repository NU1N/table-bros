<?php

namespace App\Filament\Resources\Parties\Pages;

use App\Filament\Resources\Parties\PartyResource;
use App\Models\News;
use App\Traits\ResourceHasSlug;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateParty extends CreateRecord
{
    use ResourceHasSlug;

    protected static string $resource = PartyResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $this->slugifyRecordTitle($data);
    }
}

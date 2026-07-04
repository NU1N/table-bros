<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Основная информация')
                    ->schema([
                        TextInput::make('title')
                            ->label('Название')
                            ->required()
                            ->maxLength(255),
                        RichEditor::make('content')
                            ->label('Контент')
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsVisibility('public')
                            ->fileAttachmentsDirectory('news/images')
                            ->resizableImages()
                            ->required(),
                        Textarea::make('excerpt')
                            ->label('Отрывок')
                            ->rows(3)
                            ->required()
                            ->maxLength(255),
                        SpatieMediaLibraryFileUpload::make('preview_image')
                            ->label('Превью')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->collection('preview_image'),

                        Checkbox::make('is_hidden')
                            ->label('Скрыть'),
                    ]),
            ])->columns(1);
    }
}

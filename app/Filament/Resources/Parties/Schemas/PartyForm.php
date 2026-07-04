<?php

namespace App\Filament\Resources\Parties\Schemas;

use App\Models\Party;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PartyForm
{

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Основная информация')
                    ->schema(static::mainFields()),
                Section::make('Участие')
                    ->schema(static::participationFields())
                    ->columns()
                    ->collapsible(),
                Section::make('Время и место')
                    ->schema(static::timeAndPlaceFields())
                    ->columns()
                    ->collapsible(),
                Section::make('Описание')
                    ->schema(static::descriptionFields())
                    ->collapsible(),
            ])->columns(1);
    }

    private static function mainFields(): array
    {
        return [
            TextInput::make('title')
                ->label('Название')
                ->required()
                ->maxLength(255),
            TagsInput::make('tags')
                ->suggestions(fn ($suggestions) => Party::pluck('tags')->flatten()->unique()->values()->all())
                ->label('Тэги')
                ->reorderable(),
            Checkbox::make('is_hidden')
                ->label('Скрыть'),
            Checkbox::make('is_completed')
                ->label('Завершена'),
        ];
    }

    private static function participationFields(): array
    {
        return [
            Select::make('master_id')
                ->relationship(name: 'master', titleAttribute: 'name')
                ->label('Ведущий')
                ->required(),
            TextInput::make('price')
                ->label('Цена')
                ->integer()
                ->required(),
            TextInput::make('spots')
                ->label('Всего мест')
                ->required()
                ->numeric()
                ->minValue(1),
            TextEntry::make('spots_remaining')
                ->label('Свободных мест')
        ];
    }

    private static function timeAndPlaceFields(): array
    {
        return [
            DateTimePicker::make('datetime')
                ->label('Время начала')
                ->required()
                ->seconds(false),
            TextInput::make('duration')
                ->label('Продолжительность (часы)')
                ->integer()
                ->required(),
            TextInput::make('address')
                ->label('Адрес')
                ->required()
                ->maxLength(255),
        ];
    }

    private static function descriptionFields(): array
    {
        return [
            RichEditor::make('description')
                ->label('Полное')
                ->fileAttachmentsDisk('public')
                ->fileAttachmentsVisibility('public')
                ->fileAttachmentsDirectory('parties/images')
                ->resizableImages()
                ->required(),
            Textarea::make('short_description')
                ->label('Краткое')
                ->rows(3)
                ->required()
                ->maxLength(255),
            SpatieMediaLibraryFileUpload::make('preview_image')
                ->label('Превью')
                ->image()
                ->imageEditor()
                ->disk('public')
                ->collection('preview_image'),
        ];
    }
}

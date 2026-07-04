<?php

namespace App\Filament\Resources\News\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class NewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Название')
                    ->searchable()
                    ->weight('bold'),
                TextColumn::make('created_at')
                    ->label('Время')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
                ToggleColumn::make('is_hidden')
                    ->label('Скрыто'),
            ])
            ->filters([
                Filter::make('hidden')
                    ->label('Скрытые')
                    ->query(fn (Builder $query) => $query->where('is_hidden', true)),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

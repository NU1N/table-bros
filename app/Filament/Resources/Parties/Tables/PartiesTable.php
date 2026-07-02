<?php

namespace App\Filament\Resources\Parties\Tables;

use App\Models\Party;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PartiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('avatar')
                    ->disk('public')
                    ->label(''),
                TextColumn::make('title')
                    ->label('Название')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('datetime')
                    ->label('Время')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
                TextColumn::make('master.name')
                    ->label('Ведущий'),
                ToggleColumn::make('is_hidden')
                    ->label('Скрыто'),
                ToggleColumn::make('is_completed')
                    ->label('Завершена'),
                TextColumn::make('participants_count')
                    ->label('Занято')
                    ->numeric()
                    ->counts('participants'),
                TextColumn::make('spots')
                    ->label('Всего мест')
                    ->numeric(),
                TextColumn::make('spots_remaining')
                    ->label('Свободных мест'),
            ])
            ->filters([
                Filter::make('full')
                    ->label('Скрытые')
                    ->query(fn (Builder $query) => $query->whereColumn('is_hidden', true)),
                Filter::make('full')
                    ->label('Завершена')
                    ->query(fn (Builder $query) => $query->whereColumn('is_completed', true)),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('datetime', 'desc');
    }
}

<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\Pages\ManageUsers;
use App\Models\User;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static ?string $navigationLabel = 'Пользователи';

    protected static ?int $navigationSort = 0;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Основная информация')
                    ->schema([
                        TextEntry::make('name')->label('Имя'),
                        TextEntry::make('email')->label('Электронная почта'),
                    ])
                    ->columns(),
                Section::make('Роли')
                    ->schema([
                        Toggle::make('is_admin')
                            ->label('Администратор')
                            ->helperText('Полный доступ к панели управления')
                            ->default(false),

                        Toggle::make('is_master')
                            ->label('Мастер')
                            ->helperText('Может создавать и вести партии')
                            ->default(false),
                    ])->columns(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Имя')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('email')
                    ->label('Электронная почта')
                    ->searchable()
                    ->sortable(),
                ToggleColumn::make('is_admin')
                    ->label('Админ')
                    ->sortable(),
                ToggleColumn::make('is_master')
                    ->label('Мастер')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Регистрация')
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filter::make('admin')
                    ->label('Админы')
                    ->query(fn (Builder $query) => $query->where('is_admin', true)),

                Filter::make('master')
                    ->label('Мастера')
                    ->query(fn (Builder $query) => $query->where('is_master', true)),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageUsers::route('/'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Пользователь';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Пользователи';
    }
}

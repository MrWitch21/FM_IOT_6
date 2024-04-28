<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShiftResource\Pages;
use App\Filament\Resources\ShiftResource\RelationManagers;
use App\Models\Shift;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ShiftResource extends Resource
{
    protected static ?string $model = Shift::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?int $navigationSort = 7;

    public static function getNavigationGroup(): string
    {
        return __('module_names.navigation_groups.workshifts');
    }
    public static function getModelLabel(): string
    {
        return __('module_names.shifts.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('module_names.shifts.plural_label');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),
                Forms\Components\TimePicker::make('start_time')
                    ->label(__('fields.start.time'))
                    ->required(),
                Forms\Components\TimePicker::make('end_time')
                    ->label(__('fields.end.time'))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label(__('fields.name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_time')
                    ->label(__('fields.start.time'))
                    ->dateTime('H:i'),
                Tables\Columns\TextColumn::make('end_time')
                    ->label(__('fields.end.time'))
                    ->dateTime('H:i'),
                Tables\Columns\TextColumn::make('created_at')->label(__('fields.created_at'))
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListShifts::route('/'),
            'create' => Pages\CreateShift::route('/create'),
            'edit' => Pages\EditShift::route('/{record}/edit'),
        ];
    }
}

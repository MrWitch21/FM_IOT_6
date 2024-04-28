<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScheduleResource\Pages;
use App\Filament\Resources\ScheduleResource\RelationManagers;
use App\Models\Schedule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?int $navigationSort = 9;

    public static function getNavigationGroup(): string
    {
        return __('module_names.navigation_groups.workshifts');
    }
    public static function getModelLabel(): string
    {
        return __('module_names.Schedules.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('module_names.Schedules.plural_label');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')->label(__('fields.name'))
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\DatePicker::make('shift_date')->label(__('fields.shift_date'))
                    ->required(),
                Forms\Components\Select::make('shift_id')->label(__('fields.shift_name'))
                    ->relationship('shift', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('note')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label(__('fields.name'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('shift_date')->label(__('fields.shift_date'))
                    ->dateTime('Y-m-d')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('shift.name')->label(__('fields.shift_name'))
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('user_name')->relationship('user', 'name')->label(__('fields.name'))
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSchedules::route('/'),
            'create' => Pages\CreateSchedule::route('/create'),
            'edit' => Pages\EditSchedule::route('/{record}/edit'),
        ];
    }
}

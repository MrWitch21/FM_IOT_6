<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShiftScheduleResource\Pages;
use App\Filament\Resources\ShiftScheduleResource\RelationManagers;
use App\Models\ShiftSchedule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Infolist;
use Filament\Infolists;

class ShiftScheduleResource extends Resource
{
    protected static ?string $model = ShiftSchedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?int $navigationSort = 7;

    public static function getNavigationGroup(): string
    {
        return __('module_names.navigation_groups.workshifts');
    }
    public static function getModelLabel(): string
    {
        return __('module_names.ShiftSchedules.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('module_names.ShiftSchedules.plural_label');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')->label(__('fields.user_name'))
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
                Forms\Components\TextInput::make('note')->label(__('fields.note'))
                ->maxLength(255),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
  {
    return $infolist
      ->schema([
        Infolists\Components\TextEntry::make('user.name')->label(__('fields.user_name')),
        Infolists\Components\TextEntry::make('shift_date')->label(__('fields.shift_date')),
        Infolists\Components\TextEntry::make('shift.name')->label(__('fields.shift_name')),
        Infolists\Components\TextEntry::make('notes')->label(__('fields.note')),
      ]);
  }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('user.name')->label(__('fields.user_name'))
                ->searchable()->sortable(),
                Tables\Columns\TextColumn::make('shift_date')->label(__('fields.shift_date'))
                ->dateTime('Y-m-d')
                ->searchable()->sortable(),
                Tables\Columns\TextColumn::make('shift.name')->label(__('fields.shift_name'))
                ->searchable()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListShiftSchedules::route('/'),
            'create' => Pages\CreateShiftSchedule::route('/create'),
            'view' => Pages\ViewShiftSchedule::route('/{record}'),
            'edit' => Pages\EditShiftSchedule::route('/{record}/edit'),
        ];
    }
}

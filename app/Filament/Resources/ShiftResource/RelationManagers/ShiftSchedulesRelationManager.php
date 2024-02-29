<?php

namespace App\Filament\Resources\ShiftResource\RelationManagers;

use App\Filament\Resources\ShiftResource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;

class ShiftSchedulesRelationManager extends RelationManager
{
    protected static string $relationship = 'shiftSchedules';

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
      return __('module_names.ShiftSchedules.plural_label');
    }
    public static function getModelLabel(): string
    {
      return __('module_names.ShiftSchedules.label');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->label(__('fields.name'))
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TimePicker::make('start_time')->label(__('fields.start.time'))->required(),
                    Forms\Components\TimePicker::make('end_time')->label(__('fields.end.time'))->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')->label(__('fields.name'))
                ->searchable()->sortable(),
                Tables\Columns\TextColumn::make('start_time')->label(__('fields.start.time'))->dateTime('H:i')
                ->searchable()->sortable(),
                Tables\Columns\TextColumn::make('end_time')->label(__('fields.end.time'))->dateTime('H:i')
                ->searchable()->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->url(fn (): string => ShiftResource::getUrl('create')),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->url(fn (Model $record): string => ShiftResource::getUrl('view', ['record' => $record])),
                Tables\Actions\EditAction::make()->url(fn (Model $record): string => ShiftResource::getUrl('edit', ['record' => $record])),
            ])
            ->bulkActions([])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()->url(fn (): string => ShiftResource::getUrl('create')),
            ]);
    }
}

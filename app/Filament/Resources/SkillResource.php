<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkillResource\Pages;
use App\Filament\Resources\SkillResource\RelationManagers;
use App\Models\Skill;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SkillResource extends Resource
{
    protected static ?string $model = Skill::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function getNavigationGroup(): string
    {
        return __('module_names.navigation_groups.administration');
    }

    public static function getModelLabel(): string
    {
        return __('module_names.skills.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('module_names.skills.plural_label');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->label(__('fields.name'))
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')->label(__('fields.description'))
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')->label(__('fields.name'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')->label(__('fields.description'))
                    ->limit(30)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label(__('fields.created_at'))
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->searchable(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSkills::route('/'),
            'create' => Pages\CreateSkill::route('/create'),
            'view' => Pages\ViewSkill::route('/{record}'),
            'edit' => Pages\EditSkill::route('/{record}/edit'),
        ];
    }
}

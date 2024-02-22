<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeviceTypeResource\Pages;
use App\Filament\Resources\DeviceTypeResource\RelationManagers;
use App\Models\DeviceType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
/*
tulajdonság mezői:
model fájl megnevezése (ezt használja majd az Eloquent műveletek végrehajtásához)
navigationIcon: a menüben ez az icon jelenik meg a neve mellett. A Filament alapértelmezetten a Heroicons nevű ikongyűjteményt használja, így ha egyszerűen le szeretnénk cserélni bárminek az ikonját, akkor ennek a gyűjtemények a tartalmában keresgéljünk: https://heroicons.com/
metódusai:
form(): ezzel a metódussal tudjuk meghatározni, hogy a létrehozási / szerkesztési (create / edit) űrlapon milyen típusú mezők jelenjenek meg és azoknak milyen validációs szabályoknak kell megfelelniük
table(): ezzel a metódussal tudjuk meghatározni, hogy az erőforrás lista nézetén (index) látható táblázat milyen oszlopokat (columns, mezőket) tartalmazzon és azok milyen sorrendben kövessék egymást, esetleg kereshetőek vagy rendezhetőek legyenek, továbbá a táblázat még részletesebb testreszabása, például hogy milyen szűrőket (filters) lehessen beállítani és milyen műveleteket lehessen innen a lista nézetből még elérni:
a táblázat soraiban (actions) adott erőforrás szerkesztése, törlése stb.
ha már több erőforrásunk van a táblázatban, akkor "tömeges" műveleteket (bulkActions) is végrehajthatunk rajtuk az egyes sorok kijelölése után például együtt törölhetjük őket,
ha még nincs erőforrásunk (emptyStateActions), akkor a táblázat helyén az új hozzáadása gomb elérhető.
getRelations(): ezzel tudjuk majd beállítani, hogy az erőforrás milyen más erőforrásokkal legyen kapcsolatban (hasonlóan a modellekhez) és a kapcsolatot hogyan kezelje a Filament,
getPages(): az erőforrások kezeléséhez tartozó útvonalakat lehet itt regisztrálni. Alapértelmezetten tartalmazza a lista, valamint a létrehozási (create) és szerkesztési (edit) útvonalakat.
*/
class DeviceTypeResource extends Resource
{
    protected static ?string $model = DeviceType::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Section::make()
            ->schema([
                Forms\Components\TextInput::make('name')->label(__('fields.name'))
                ->required()
                ->unique(ignoreRecord: true)
                ->maxLength(255),
                Forms\Components\TextInput::make('note')->label(__('fields.note'))
                ->maxLength(255),
            ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->searchable()->sortable(),
                Tables\Columns\TextColumn::make('name')->label(__('fields.name'))
                ->searchable()->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label(__('fields.created_at'))
                ->dateTime('Y-m-d H:i')
                ->searchable()->sortable(),
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDeviceTypes::route('/'),
            'create' => Pages\CreateDeviceType::route('/create'),
            'edit' => Pages\EditDeviceType::route('/{record}/edit'),
        ];
    }


    public static function getNavigationGroup(): string
    {
        return __('module_names.navigation_groups.administration');
    }

    //a Model-hez tartozó többnyelvűsített nevek
    public static function getModelLabel(): string
    {
        return __('module_names.device_types.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('module_names.device_types.plural_label');
    }
}

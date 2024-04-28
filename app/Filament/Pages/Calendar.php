<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Calendar extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static string $view = 'filament.pages.calendar';
    protected static ?int $navigationSort = 10;
    protected static ?string $pluralModelLabel = 'clientes';
    public static function getNavigationGroup(): string
    {
        return __('module_names.navigation_groups.workshifts');
    }
    public static function getNavigationLabel(): string
    {
        return __('module_names.Calendar.label');
    }
}

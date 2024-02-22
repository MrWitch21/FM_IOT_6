<?php

namespace App\Filament\Widgets;

use App\Models\DeviceType; //Fontos az import!!! megint
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DeviceTypeOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('DeviceType', DeviceType::query()->count())->label(__('module_names.device_types.plural_label')),
        ];
    }
}

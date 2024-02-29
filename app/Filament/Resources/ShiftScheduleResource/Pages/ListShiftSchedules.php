<?php

namespace App\Filament\Resources\ShiftScheduleResource\Pages;

use App\Filament\Resources\ShiftScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShiftSchedules extends ListRecords
{
    protected static string $resource = ShiftScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

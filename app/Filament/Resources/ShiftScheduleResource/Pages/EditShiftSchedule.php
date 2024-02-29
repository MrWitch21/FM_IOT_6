<?php

namespace App\Filament\Resources\ShiftScheduleResource\Pages;

use App\Filament\Resources\ShiftScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShiftSchedule extends EditRecord
{
    protected static string $resource = ShiftScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

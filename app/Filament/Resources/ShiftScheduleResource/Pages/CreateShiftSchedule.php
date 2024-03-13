<?php

namespace App\Filament\Resources\ShiftScheduleResource\Pages;

use App\Filament\Resources\ShiftScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateShiftSchedule extends CreateRecord
{
    protected static string $resource = ShiftScheduleResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

<?php

namespace App\Filament\Resources\WorksheetResource\Pages;

use Filament\Actions;
use App\Models\Worksheet;
use App\Enums\WorksheetPriority;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\WorksheetResource;
use Filament\Resources\Pages\ListRecords\Tab;

class ListWorksheets extends ListRecords
{
    protected static string $resource = WorksheetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTabs(): array
    {
        $tabs = [
            'all' => Tab::make()->label(__('fields.all'))
                ->icon('heroicon-o-list-bullet')
                ->badge(Worksheet::query()->count()),
        ];

        $priorities = array_column(WorksheetPriority::cases(), 'value');

        foreach ($priorities as $priority) {
            $tabs[$priority] = Tab::make()->label($priority)
                ->modifyQueryUsing(
                    fn (Builder $query) => $query
                        ->where('priority', $priority)
                )
                ->badge(
                    Worksheet::query()
                        ->where('priority', $priority)
                        ->count()
                )
                ->icon(WorksheetPriority::tryFrom($priority)?->getIcon());
        }
        return $tabs;
    }

    public ?string $activeTab = 'all';
}

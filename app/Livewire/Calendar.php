<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\ShiftSchedule;
use App\Models\User;
use Doctrine\DBAL\Schema\View;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Psy\Readline\Hoa\Console;
use Filament\Forms\Get;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

use function Termwind\render;

class Calendar extends Component implements HasForms
{
    public Model | string | null $model = ShiftSchedule::class;
    use InteractsWithForms;
    public static $events = [];
    public function render()
    {
        $events = [];
        $data = auth()->id();
        $events = ShiftSchedule::query()
            ->where('user_id', $data)
            ->get()
            ->map(function (ShiftSchedule $task) {
                $taskStartDateTime = $task->shift_date . ' ' . $task->shift->start_time;
                $taskEndDateTime = $task->shift_date . ' ' . $task->shift->end_time;
                return [
                    'id'    => $task->id,
                    'title' => $task->shift->name,
                    'start' => $taskStartDateTime,
                    'end'   => $taskEndDateTime,
                    'allDay' => false,
                ];
            })
            ->toArray();
        return view('livewire.calendar', [
            'events' => $events
        ]);
    }
}

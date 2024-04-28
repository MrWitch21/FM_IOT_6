<?php
namespace App\Livewire;

use App\Models\User;
use Filament\Forms\Get;
use Livewire\Component;
use App\Models\Schedule;
use Filament\Forms\Form;
use Illuminate\Support\Arr;
use App\Models\ShiftSchedule;
use function Termwind\render;
use Psy\Readline\Hoa\Console;
use Doctrine\DBAL\Schema\View;
use Illuminate\Support\Collection;
use Filament\Forms\Components\Select;
use Filament\Forms\Contracts\HasForms;

use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Concerns\InteractsWithForms;

class Calendar extends Component implements HasForms
{
    public Model | string | null $model = Schedule::class;
    use InteractsWithForms;
    public static $events = [];
    public function render()
    {
        $events = [];
        $data = auth()->id();
        $events = Schedule::query()
            ->where('user_id', $data)
            ->get()
            ->map(function (Schedule $task) {
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

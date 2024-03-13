<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class shift extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'start_time', 'end_time'];
    public function shiftSchedules() : HasMany
    {
        return $this->hasMany(ShiftSchedule::class, 'shift_id');
    }
}

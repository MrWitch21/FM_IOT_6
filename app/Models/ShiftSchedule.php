<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ShiftSchedule extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'shift_date', 'shift_id', 'note'];
    public function shift() : BelongsTo
    {
        return $this->belongsTo(Shift::class, 'shift_id');
    }
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

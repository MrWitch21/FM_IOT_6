<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'device_id', 'attachment'];

    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class);
    }

}

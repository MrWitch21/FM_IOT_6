<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Filament\Panel;
use Filament\Models\Contracts\FilamentUser;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'new_password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function canAccessPanel(Panel $panel): bool
    {
        return str_ends_with($this->email, '@admin.hu'); //itt tudjuk testreszabni hogy milyen végződésű e-mail-el lehessen belépni @cégnév
    }
    public function ShiftSchedulesUser() : HasMany
    {
        return $this->hasMany(ShiftSchedule::class, 'user_id');
    }

    public function creators_worksheets(): HasMany
    {
        return $this->hasMany(Worksheet::class, 'creator_id');
    }

    public function repairers_worksheets(): HasMany
    {
        return $this->hasMany(Worksheet::class, 'repairer_id');
    }
}

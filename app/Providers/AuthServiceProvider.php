<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Models\Shift;
use App\Models\Skill;
use App\Models\Schedule;
use App\Models\Worksheet;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\ShiftPolicy;
use App\Policies\SkillPolicy;
use App\Policies\SchedulePolicy;
use App\Policies\WorksheetPolicy;
use App\Policies\PermissionPolicy;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Permission::class => PermissionPolicy::class,
        Role::class => RolePolicy::class,
        User::class => UserPolicy::class,
        Worksheet::class => WorksheetPolicy::class,
        Skill::class => SkillPolicy::class,
        Shift::class => ShiftPolicy::class,
        Schedule::class => SchedulePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Policies;

use App\Models\ShiftSchedule;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ShiftSchedulePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('read ShiftSchedules');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ShiftSchedule $shiftSchedule): bool
    {
        return $user->can('read ShiftSchedules');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create ShiftSchedules');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ShiftSchedule $shiftSchedule): bool
    {
        return $user->can('update ShiftSchedules');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ShiftSchedule $shiftSchedule): bool
    {
        return $user->can('delete ShiftSchedules');
    }

    /**
     * Determine whether the user can restore the model.
     */
    /*public function restore(User $user, ShiftSchedule $shiftSchedule): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    /*public function forceDelete(User $user, ShiftSchedule $shiftSchedule): bool
    {
        //
    }*/
}

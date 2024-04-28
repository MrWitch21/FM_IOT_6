<?php

namespace App\Policies;

use App\Models\Shift;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ShiftPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('read shifts');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Shift $shift): bool
    {
        return $user->can('read shifts');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create shifts');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Shift $shift): bool
    {
        return $user->can('update shifts');
    }
}

<?php

namespace App\Policies;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SkillPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('read skills');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Skill $skill): bool
    {
        return $user->can('read skills');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create skills');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Skill $skill): bool
    {
        return $user->can('update skills');
    }
}

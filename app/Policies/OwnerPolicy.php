<?php

namespace App\Policies;

use App\Models\Owners;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OwnerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['admin', 'viewer', 'editor']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Owners $owner): bool
    {
        return $user->role === 'admin' || $user->role === 'viewer' || $user->id === $owner->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Owners $owner): bool
    {
        return $user->role === 'admin' || $user->id === $owner->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Owners $owners): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Owners $owners): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Owners $owners): bool
    {
        return false;
    }
}

<?php

namespace App\Policies;

use App\Models\Account;
use App\Models\Badge;
use Illuminate\Auth\Access\Response;

class BadgePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Account $account): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Account $account, Badge $badge): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Account $account): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Account $account, Badge $badge): Response
    {
        return $account->user_id === $badge->user_id
            ? Response::allow()
            : Response::deny('You do not own this badge.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Account $account, Badge $badge): Response
    {
        return $account->user_id === $badge->user_id
            ? Response::allow()
            : Response::deny('You do not own this badge.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Account $account, Badge $badge): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Account $account, Badge $badge): bool
    {
        return false;
    }
}

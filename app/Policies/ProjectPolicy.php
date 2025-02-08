<?php

namespace App\Policies;

use App\Models\Account;
use App\Models\Class_project;
use Illuminate\Auth\Access\Response;

class ProjectPolicy
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
    public function view(Account $account, Class_project $classProject): bool
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
    public function update(Account $account, Class_project $classProject): Response
    {
        return $account->user_id === $classProject->user_id
            ? Response::allow()
            : Response::deny('You do not own this project.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Account $account, Class_project $classProject): Response
    {
        return $account->user_id === $classProject->user_id
            ? Response::allow()
            : Response::deny('You do not own this project.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Account $account, Class_project $classProject): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Account $account, Class_project $classProject): bool
    {
        return false;
    }
}

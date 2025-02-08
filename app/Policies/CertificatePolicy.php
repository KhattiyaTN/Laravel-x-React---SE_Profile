<?php

namespace App\Policies;

use App\Models\Account;
use App\Models\Certificate;
use Illuminate\Auth\Access\Response;

class CertificatePolicy
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
    public function view(Account $account, Certificate $certificate): bool
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
    public function update(Account $account, Certificate $certificate): Response
    {
        return $account->user_id === $certificate->user_id
            ? Response::allow()
            : Response::deny('You do not own this certificate.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Account $account, Certificate $certificate): Response
    {
        return $account->user_id === $certificate->user_id
            ? Response::allow()
            : Response::deny('You do not own this certificate.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Account $account, Certificate $certificate): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Account $account, Certificate $certificate): bool
    {
        return false;
    }
}

<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

  /**
     * Determine whether the user can index models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function index(User $user)
    {
        return  in_array($user->role->label, ['admin','supadmin']);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return  in_array($user->role->label, ['admin','supadmin']);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\SubCategory  $subCategory
     * @return mixed
     */
    public function update(User $user)
    {
        return  in_array($user->role->label, ['admin','supadmin']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\SubCategory  $subCategory
     * @return mixed
     */
    public function delete(User $user)
    {
        return  in_array($user->role->label, ['admin','supadmin']);
    }
}

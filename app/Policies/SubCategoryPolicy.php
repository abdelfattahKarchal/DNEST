<?php

namespace App\Policies;

use App\SubCategory;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\SubCategory  $subCategory
     * @return mixed
     */
    public function view(User $user, SubCategory $subCategory)
    {
        //
    }

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
    public function update(User $user, SubCategory $subCategory)
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
    public function delete(User $user, SubCategory $subCategory)
    {
        return  in_array($user->role->label, ['admin','supadmin']);
    }
    /**
     * Determine whether the user can active the model.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function active(User $user)
    {
        return  in_array($user->role->label, ['admin','supadmin']);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\SubCategory  $subCategory
     * @return mixed
     */
    public function restore(User $user, SubCategory $subCategory)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\SubCategory  $subCategory
     * @return mixed
     */
    public function forceDelete(User $user, SubCategory $subCategory)
    {
        //
    }
}

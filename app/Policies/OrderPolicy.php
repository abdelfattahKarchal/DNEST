<?php

namespace App\Policies;

use App\Order;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
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
     * @param  \App\Order  $order
     * @return mixed
     */
    public function view(User $user, Order $order)
    {
        //
    }

    /**
     * Determine whether the user can see not confirmed list models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function listNotConfirmed(User $user)
    {
        return in_array($user->role->label, ['admin','supadmin']);
    }
    /**
     * Determine whether the user can see confirmed list models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function listConfirmed(User $user)
    {
        return in_array($user->role->label, ['admin','supadmin']);
    }
    /**
     * Determine whether the user can see in progress list models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function listInprogress(User $user)
    {
        return in_array($user->role->label, ['admin','supadmin']);
    }
    /**
     * Determine whether the user can see cancel list models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function listCanceled(User $user)
    {
        return in_array($user->role->label, ['admin','supadmin']);
    }

    /**
     * Determine whether the user can updateStatut models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function updateStatut(User $user)
    {
        return in_array($user->role->label, ['admin','supadmin']);
    }
    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return in_array($user->role->label, ['admin','supadmin']);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Order  $order
     * @return mixed
     */
    public function update(User $user, Order $order)
    {
        return in_array($user->role->label, ['admin','supadmin']);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Order  $order
     * @return mixed
     */
    public function delete(User $user, Order $order)
    {
        return in_array($user->role->label, ['admin','supadmin']);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Order  $order
     * @return mixed
     */
    public function restore(User $user, Order $order)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Order  $order
     * @return mixed
     */
    public function forceDelete(User $user, Order $order)
    {
        //
    }
}

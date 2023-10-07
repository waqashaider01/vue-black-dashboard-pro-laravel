<?php

namespace App\Policies;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('view roles');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Role  $model
     * @return mixed
     */
    public function view(User $user, Role $model)
    {
        if ($user->roles->contains($model)) {
            return true;
        }

        return $user->can('view roles');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user)
    {
        return $user->can('create roles');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Role $model
     * @return bool
     */
    public function update(User $user, Role $model)
    {
        return $user->can('edit roles');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Role $model
     * @return bool
     */
    public function delete(User $user, Role $model)
    {
        return $user->can('delete roles');
    }
}

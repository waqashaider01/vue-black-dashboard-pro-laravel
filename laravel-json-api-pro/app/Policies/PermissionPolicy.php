<?php

namespace App\Policies;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
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
        return $user->can('view permissions');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Permission  $model
     * @return mixed
     */
    public function view(User $user, Permission $model)
    {
        if ($user->getAllPermissions()->contains($model)) {
            return true;
        }

        return $user->can('view permissions');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Permission  $model
     * @return mixed
     */
    public function update(User $user, Permission $model)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Permission  $model
     * @return mixed
     */
    public function delete(User $user, Permission $model)
    {
        return false;
    }
}

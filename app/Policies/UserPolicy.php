<?php

namespace App\Policies;

use App\Model\admin\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(admin $user)
    {
        //
    }

    public function view(admin $user, admin $model)
    {
        //
    }

    public function create(admin $user)
    {
        return $this->getPermission($user, 4);
    }

    public function update(admin $user)
    {
        return $this->getPermission($user, 6);

    }

    public function delete(admin $user)
    {
        return $this->getPermission($user, 5);

    }

    public function restore(admin $user, admin $model)
    {
        //
    }

    public function forceDelete(admin $user, admin $model)
    {
        //
    }

    protected function getPermission($user, $p_id)
    {
        foreach ($user->roles as $role){
            foreach ($role->permissions as $permission){
                if ($permission->id == $p_id){
                    return true;
                }
            }
        }
        return false;
    }
}

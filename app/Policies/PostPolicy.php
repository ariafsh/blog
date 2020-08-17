<?php

namespace App\Policies;

use App\Model\admin\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class postPolicy
{
    use HandlesAuthorization;


    public function viewAny(admin $user)
    {
        //
    }

    public function view(admin $user)
    {
        //
    }

    public function create(admin $user)
    {
        return $this->getPermission($user, 1);
    }

    public function update(admin $user)
    {
        return $this->getPermission($user, 9);

    }

    public function delete(admin $user)
    {
        return $this->getPermission($user, 2);

    }

    public function tag(admin $user)
    {
        return $this->getPermission($user, 7);

    }

    public function category(admin $user)
    {
        return $this->getPermission($user, 8);

    }

    public function restore(admin $user)
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

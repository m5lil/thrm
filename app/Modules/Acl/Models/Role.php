<?php

namespace App\Modules\Acl\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }


    /**
     * @param Permission $permission
     * @return void
     */
    public function givePermissionTo(Permission $permission)
    {
        return $this->permissions()->save(
            $permission
        );
    }



}

<?php

namespace App\Modules\Acl\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{



    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

}

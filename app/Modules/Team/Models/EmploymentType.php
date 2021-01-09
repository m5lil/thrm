<?php

namespace App\Modules\Team\Models;

use App\Modules\Leave\Models\Leave;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentType extends Model
{



     public function leaves()
    {
        return $this->belongsToMany(Leave::class)->withPivot('custom_total_days');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    // Define relationship with Designation
    public function designation()
    {
        return $this->belongsTo(Designation::class, 'fk_designation');
    }

    // Define relationship with Department
    public function department()
    {
        return $this->belongsTo(Department::class, 'fk_department');
    }
}

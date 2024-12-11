<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    // Define relationship with User
    public function users()
    {
        return $this->hasMany(User::class, 'fk_department');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    /**
     * Get the department that owns the user.
     */
    public function department()
    {
        return $this->belongsTo('App\models\Department', 'Fk_department', 'id');
    }
    /**
     * Get the designation that owns the user.
     */
    public function designation()
    {
        return $this->belongsTo('App\models\Designation', 'Fk_designation', 'id');
    }
}

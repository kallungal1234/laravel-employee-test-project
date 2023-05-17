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
    public function dept()
    {
        return $this->belongsTo(Department::class, 'Fk_department', 'id');
    }
    /**
     * Get the designation that owns the user.
     */
    public function designation()
    {
        return $this->belongsTo(Designation::class, 'Fk_designation', 'id');
    }
}

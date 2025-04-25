<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function detail()
    {
        // Each user has one user_details
        return $this->hasOne(UserDetail::class);
    }

    public function department()
    {
        // This user belongs to a department
        return $this->belongsTo(Department::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticable
{
    use HasFactory;
    use Notifiable;

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

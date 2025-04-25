<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;


    public function user()
    {
        // Each user one user_details / Each user_details belongs to a single user
        return $this->belongsTo(User::class);
    }
}

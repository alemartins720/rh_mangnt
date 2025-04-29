<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function users()
    {
        // Each department can be filled with multiples users
        return $this->belongsToMany(User::class);
    }
}

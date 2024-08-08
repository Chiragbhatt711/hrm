<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'admin_id',
        'full_name',
        'trainer_id',
        'role',
        'email',
        'phone',
        'status',
        'description',
    ];
}

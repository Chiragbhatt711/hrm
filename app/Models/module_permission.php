<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class module_permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'employee_id',
        'module_permission',
        'id_count',
        'read',
        'write',
        'create',
        'delete',
        'import',
        'export',
    ];
}

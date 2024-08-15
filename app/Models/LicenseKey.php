<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenseKey extends Model
{
    use HasFactory;
    protected $fillable = [
        'key',
        'valid_day',
        'activate_date'
    ];
}

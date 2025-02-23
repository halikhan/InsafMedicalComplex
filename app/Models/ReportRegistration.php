<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'department',
        'format_name',
        'description',
    ];
}

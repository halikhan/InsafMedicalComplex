<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_name',
        'department_name',
        'panel_outside',
        'collection_method',
        'test_name',
        'general_charges',
        's_private',
        'private',
        'status',
        'category',
        'report_days',
        'is_profile_test',
    ];
}

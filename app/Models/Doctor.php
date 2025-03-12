<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'specialist_type',
        'visit_days',
        'degrees',
        'contact',
        'address',
        'email',
        'psp',
        'services_chr',
        'routine_percentage',
        'special_percentage',
        'xray_percentage',
        'ultrasound_percentage',
        'ecg_percentage',
        'endoscopy_percentage',
        'mri_percentage',
        'dental_percentage',
        'opd_percentage',
        'ipd_percentage',
        'ct_scan_percentage',
        'color_doppler_percentage',
        'image'
    ];
   
}

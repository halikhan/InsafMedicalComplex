<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientSlip extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'slip_date',
        'shift',
        'other_reference_no',
        'time',
        'patient_name',
        'doctor_name',
        'age',
        'charges',
        'gender',
        'contact_no',
        'ref_phy',
        'pressdown_location',
        'panel_outside',  // Added
        'patient_history',
        'procedure_name',
        'test_name',  // Added
        'service_name',  // Added
        'total_amount',
        'discount',
        'cash_received',
        'dues'
    ];

    
}

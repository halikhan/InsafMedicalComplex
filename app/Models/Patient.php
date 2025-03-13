<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'contact', 'cnic', 'age', 'gender', 'admit_date', 'shift', 'time',
        'file_no', 'panel_outside', 'doctor_name', 'service_name', 'admission_type', 
        'room_no', 'attendant_name', 'attendant_contact', 'relation_with_patient',
        'advance_received', 'admission_number', 'lmp_date', 'expected_due_date'
    ];
}

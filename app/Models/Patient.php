<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'contact', 'cnic', 'age', 'gender', 'admit_date', 'shift', 'time',
        'file_no', 'room_no', 'attendant_name', 'attendant_contact', 'relation_with_patient',
        'advance_received', 'admission_number', 'admission_type', 'lmp_date', 'expected_due_date'
    ];
}
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'panel_name',
        'panel_address',
        'contact_no',
        'panel_code',
        'reg_date',
        'rate_list_status',
    ];
}

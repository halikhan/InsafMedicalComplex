<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('doctors')->insert([
            [
                'name' => 'Dr. Ehsan Khan',
                'visit_days' => 'Mon-Wed-Fri',
                'degrees' => 'MBBS, FCPS',
                'contact' => '1234567890',
                'address' => 'Asif Square#01, City',
                'email' => 'ehsan@insaaf.com',
                'image' => 'admin-assets/assets/doctor-image/1045630145.jpg',
                'specialist_type' => 'PRIVATE',
                'psp' => 100,
                'services_chr' => 200,
                'routine_percentage' => 10,
                'special_percentage' => 15,
                'xray_percentage' => 12,
                'ultrasound_percentage' => 18,
                'ecg_percentage' => 8,
                'endoscopy_percentage' => 20,
                'mri_percentage' => 25,
                'dental_percentage' => 30,
                'opd_percentage' => 5,
                'ipd_percentage' => 7,
                'ct_scan_percentage' => 10,
                'color_doppler_percentage' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

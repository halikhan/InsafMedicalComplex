<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('visit_days');
            $table->string('degrees');
            $table->string('contact');
            $table->string('address');
            $table->string('email')->nullable();
            $table->string('image')->nullable();
            $table->string('specialist_type')->nullable();
            $table->decimal('psp', 8, 2)->default(0);
            $table->decimal('services_chr', 8, 2)->default(0);

            // Charge Percentages
            $table->decimal('routine_percentage', 5, 2)->default(0);
            $table->decimal('special_percentage', 5, 2)->default(0);
            $table->decimal('xray_percentage', 5, 2)->default(0);
            $table->decimal('ultrasound_percentage', 5, 2)->default(0);
            $table->decimal('ecg_percentage', 5, 2)->default(0);
            $table->decimal('endoscopy_percentage', 5, 2)->default(0);
            $table->decimal('mri_percentage', 5, 2)->default(0);
            $table->decimal('dental_percentage', 5, 2)->default(0);
            $table->decimal('opd_percentage', 5, 2)->default(0);
            $table->decimal('ipd_percentage', 5, 2)->default(0);
            $table->decimal('ct_scan_percentage', 5, 2)->default(0);
            $table->decimal('color_doppler_percentage', 5, 2)->default(0);
            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }
    // public function up(): void
    // {
    //     Schema::create('doctors', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('name');
    //         $table->string('phone');
    //         $table->string('speciality')->nullable();
    //         $table->string('room')->nullable();
    //         $table->string('time');
    //         $table->string('day');
    //         $table->string('fee');
    //         $table->text('description')->nullable();
    //         $table->string('image');
    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};

<?php

// Migration: database/migrations/xxxx_xx_xx_create_patients_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address')->nullable();
            $table->string('contact');
            $table->string('cnic')->nullable();
            $table->integer('age');
            $table->string('gender');
            $table->date('admit_date');
            $table->string('shift');
            $table->time('time');
            $table->string('file_no')->nullable();
            $table->string('room_no');
            $table->string('attendant_name')->nullable();
            $table->string('attendant_contact')->nullable();
            $table->string('relation_with_patient')->nullable();
            $table->decimal('advance_received', 10, 2)->default(0);
            $table->string('admission_number')->unique();
            $table->string('admission_type');
            $table->date('lmp_date')->nullable();
            $table->date('expected_due_date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patients');
    }
};

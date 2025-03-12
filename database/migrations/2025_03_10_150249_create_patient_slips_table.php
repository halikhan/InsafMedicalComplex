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
        Schema::create('patient_slips', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id');
            $table->date('slip_date');
            $table->string('shift');
            $table->string('other_reference_no')->nullable();
            $table->time('time');
            $table->string('patient_name');
            $table->integer('age');
            $table->string('gender');
            $table->string('contact_no')->nullable();
            $table->string('ref_phy')->nullable();
            $table->string('pressdown_location')->nullable();
            $table->string('panel_outside');
            $table->text('patient_history')->nullable();
            $table->string('procedure_name');
            $table->string('test_name');
            $table->string('service_name');
            $table->string('doctor_name');
            $table->decimal('charges', 10, 2)->nullable();
            $table->decimal('change_rate', 10, 2)->nullable();
            $table->decimal('discount', 10, 2)->nullable();
            $table->decimal('total_amount', 10, 2);
            $table->decimal('cash_received', 10, 2);
            $table->decimal('dues', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_slips');
    }
};

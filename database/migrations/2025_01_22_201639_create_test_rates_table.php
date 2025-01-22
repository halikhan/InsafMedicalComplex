<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('test_rates', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');
            $table->string('department_name');
            $table->string('panel_outside');
            $table->string('collection_method')->nullable();
            $table->string('test_name');
            $table->decimal('general_charges', 10, 2);
            $table->decimal('s_private', 10, 2)->default(0);
            $table->decimal('private', 10, 2)->default(0);
            $table->string('status')->default('Active');
            $table->string('category')->default('NORMAL');
            $table->integer('report_days')->nullable();
            $table->boolean('is_profile_test')->default(false);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_rates');
    }
};

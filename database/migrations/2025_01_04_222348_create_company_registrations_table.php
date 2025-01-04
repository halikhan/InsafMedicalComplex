<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::create('company_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('panel_name');
            $table->text('panel_address')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('panel_code')->nullable();
            $table->date('reg_date');
            $table->enum('rate_list_status', ['Same Rate', 'Change Rate', 'Outside RateList']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_registrations');
    }
}

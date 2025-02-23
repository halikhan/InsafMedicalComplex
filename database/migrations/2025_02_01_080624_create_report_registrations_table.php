<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::create('report_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('department');
            $table->string('format_name');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('report_registrations');
    }
}

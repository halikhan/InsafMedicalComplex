<?php
// database/migrations/xxxx_xx_xx_create_accounts_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_number')->unique();
            $table->enum('account_type', ['ASSETS', 'LIABILITIES', 'EQUITY', 'INCOME', 'EXPENSES']);
            $table->string('account_name');
            $table->date('opening_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}

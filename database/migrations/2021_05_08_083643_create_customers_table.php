<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('ID_Customer');
            $table->string('Username', 30);
            $table->string('Pass');
            $table->string('CTM_Name', 30);
            $table->date('CTM_DoB');
            $table->string('CTM_Gender', 3);
            $table->string('CTM_Phone', 10);
            $table->string('CTM_Mail', 50)->nullable();
            $table->string('CTM_Address')->nullable();
            $table->string('CTM_Avatar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}

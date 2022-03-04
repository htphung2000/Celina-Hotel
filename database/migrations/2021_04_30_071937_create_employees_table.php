<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('ID_Employee');
            $table->integer('ID_Dpm')->unsigned();
            $table->foreign('ID_Dpm')->references('ID_Department')->on('Departments');
            $table->string('Fullname', 30);
            $table->date('DoB');
            $table->string('Gender', 3);
            $table->string('Phone', 10);
            $table->string('Mail', 50);
            $table->string('Address');
            $table->integer('Position_Emp')->unsigned();
            $table->foreign('Position_Emp')->references('ID_Position')->on('Salaries');
            $table->string('Avatar');
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
        Schema::dropIfExists('employees');
    }
}

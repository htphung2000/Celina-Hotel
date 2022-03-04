<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_details', function (Blueprint $table) {
            $table->integer('Bill')->unsigned();
            $table->foreign('Bill')->references('ID_Bill')->on('Bills');
            $table->integer('Room');
            $table->foreign('Room')->references('ID_Room')->on('Rooms');
            $table->date('Start_at');
            $table->date('End_at');
            $table->datetime('Check_in')->nullable();
            $table->datetime('Check_out')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('bill_details');
    }
}

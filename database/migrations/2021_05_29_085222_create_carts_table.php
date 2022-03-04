<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('Item');
            $table->integer('Customer_ID')->unsigned();
            $table->foreign('Customer_ID')->references('ID_Customer')->on('Customers');
            $table->integer('Room_ID');
            $table->foreign('Room_ID')->references('ID_Room')->on('Rooms');
            $table->date('Start');
            $table->date('End');
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
        Schema::dropIfExists('carts');
    }
}

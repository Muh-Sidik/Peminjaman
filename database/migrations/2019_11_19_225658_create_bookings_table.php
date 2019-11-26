<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('booking_id');
            $table->string('booking_code');
            $table->date('order_date');
            $table->integer('duration');
            $table->integer('price');
            $table->integer('amount_item');
            $table->enum('status', ['paid', 'process']);
            $table->date('return_date_supposed');
            $table->date('return_date')->nullable();
            $table->string('fine')->nullable();
            $table->bigInteger('employee_id')->unsigned();
            $table->bigInteger('client_id')->unsigned();
            $table->bigInteger('item_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}

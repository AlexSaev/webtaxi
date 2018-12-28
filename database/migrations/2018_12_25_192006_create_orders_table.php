<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('order_number');
            $table->string('point_of_arrival', 70);
            $table->string('departure_point', 70);
            $table->double('payment_for_travel')->default(200);
            $table->dateTime('date_of_the_travel');
            $table->UnsignedBigInteger('phone_number');
            $table->foreign('phone_number')->references('phone_number')->on('passengers')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->UnsignedBigInteger('license_number')->nullable();
            $table->foreign('license_number')->references('license_number')->on('drivers')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->boolean('is_cancelled')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoadListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('road_lists', function (Blueprint $table) {
            $table->increments('list_number');
            $table->date('valid_from');
            $table->date('valid_untill');
            $table->string('car_number', 9);
            $table->foreign('car_number')->references('car_number')->on('automobiles')
                ->onDelete('restrict')->onUpdate('cascade');
            $table->UnsignedBigInteger('license_number');
            $table->foreign('license_number')->references('license_number')->on('drivers')
                ->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('road_lists');
    }
}
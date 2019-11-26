<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('restaurant_name');
            $table->bigInteger('detail_id')->unsigned();
            $table->bigInteger('address_id')->unsigned();
            $table->bigInteger('establishment_type_id')->unsigned();
            $table->timestamps();

            $table->foreign('detail_id')->references('id')->on('details')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('address_id')->references('id')->on('addresses')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('establishment_type_id')->references('id')->on('establishments')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
        // Schema::disableForeignKeyConstraints();
        // Schema::drop('restaurants');
        // Schema::enableForeignKeyConstraints();
    }
}

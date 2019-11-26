<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttractionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attractions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('attraction_name');
            $table->bigInteger('detail_id')->unsigned();
            $table->bigInteger('address_id')->unsigned();
            $table->string('rec_duration');
            $table->timestamps();

            $table->foreign('detail_id')->references('id')->on('details')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('address_id')->references('id')->on('addresses')->onUpdate('cascade')->onDelete('restrict');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attractions');
        // Schema::disableForeignKeyConstraints();
        // Schema::drop('attractions');
        // Schema::enableForeignKeyConstraints();
    }
}

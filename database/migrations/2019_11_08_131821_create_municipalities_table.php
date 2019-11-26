<?php
# @Author: maerielbenedicto
# @Date:   2019-11-08T13:18:21+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-08T13:19:24+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipalitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipalities', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('municipality_name');
          $table->bigInteger('city_id')->unsigned();
          $table->string('about');
          // $table->integer('view_count');
          $table->timestamps();

          $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipalities');
        // Schema::disableForeignKeyConstraints();
        // Schema::drop('municipalities');
        // Schema::enableForeignKeyConstraints();
    }
}

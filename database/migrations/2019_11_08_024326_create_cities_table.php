<?php
# @Author: maerielbenedicto
# @Date:   2019-11-08T02:43:26+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-08T02:51:15+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('city_name');
            $table->bigInteger('district_id')->unsigned();
            $table->string('about');
            // $table->integer('view_count');
            $table->timestamps();

            $table->foreign('district_id')->references('id')->on('districts')->onUpdate('cascade')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}

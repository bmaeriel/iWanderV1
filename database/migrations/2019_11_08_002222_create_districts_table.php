<?php
# @Author: maerielbenedicto
# @Date:   2019-11-08T00:22:22+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-08T00:39:19+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('district_name');
            $table->bigInteger('country_id')->unsigned();
            $table->longText('about','255');
            // $table->integet('view_count');
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('districts');
    }
}

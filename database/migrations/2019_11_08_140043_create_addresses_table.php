<?php
# @Author: maerielbenedicto
# @Date:   2019-11-08T14:00:43+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-08T19:25:54+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address1');
            $table->string('address2')->nullable($value = true);
            $table->string('address3')->nullable($value = true);
            $table->bigInteger('municipality_id')->unsigned()->nullable();
            $table->bigInteger('city_id')->unsigned();
            $table->bigInteger('district_id')->unsigned();
            $table->integer('postal_code')->nullable($value = true)->unsigned();
            $table->bigInteger('country_id')->unsigned();
            $table->timestamps();

            $table->foreign('municipality_id')->references('id')->on('municipalities')->onUpdate('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onUpdate('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onUpdate('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
        // Schema::disableForeignKeyConstraints();
        // Schema::drop('addresses');
        // Schema::enableForeignKeyConstraints();
    }
}

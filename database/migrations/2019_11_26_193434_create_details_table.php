<?php
# @Author: maerielbenedicto
# @Date:   2019-11-08T19:11:51+00:00
# @Last modified by:   maerielbenedicto
# @Last modified time: 2019-11-12T01:06:19+00:00




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->string('website')->unique();
            $table->string('email')->unique();
            $table->string('phone');
            $table->decimal('min_price',8,2)->nullable();
            $table->decimal('max_price',8,2)->nullable();
            // $table->binary('main_image');
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
      // Schema::disableForeignKeyConstraints();
      // Schema::drop('details');
      // Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('details');

    }
}

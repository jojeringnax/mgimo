<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCongratulations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('congratulations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title');
            $table->text('content');
            $table->unsignedInteger('main_photo_id');
        });

        Schema::table('congratulations', function (Blueprint $table) {
            $table->foreign('main_photo_id')->references('id')->on('photos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('congratulations', function (Blueprint $table) {
           $table->dropForeign('congratulations_main_photo_id_foreign');
        });
        Schema::dropIfExists('congratulations');
    }
}

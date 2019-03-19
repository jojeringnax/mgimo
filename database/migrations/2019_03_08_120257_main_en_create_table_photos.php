<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MainEnCreateTablePhotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_en')->create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sizeX')->nullable();
            $table->integer('sizeY')->nullable();
            $table->string('path');
            $table->smallInteger('type');
            $table->unsignedInteger('album_id')->nullable();
            $table->boolean('video')->default(false);
        });
        Schema::connection('mysql_en')->table('photos', function (Blueprint $table) {
            $table->foreign('album_id')->references('id')->on('albums');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_en')->table('photos', function (Blueprint $table) {
            $table->dropForeign('photos_album_id_foreign');
        });
        Schema::connection('mysql_en')->dropIfExists('photos');
    }
}

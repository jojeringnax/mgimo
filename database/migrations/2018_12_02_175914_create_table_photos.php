<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePhotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sizeX')->nullable();
            $table->integer('sizeY')->nullable();
            $table->string('path');
            $table->smallInteger('type');
            $table->unsignedInteger('album_id')->nullable();
            $table->boolean('video')->default(false);
        });
        Schema::table('photos', function (Blueprint $table) {
            $table->foreign('album_id')->references('id')->on('albums');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->dropForeign('photos_album_id_foreign');
        });
        Schema::dropIfExists('photos');
    }
}

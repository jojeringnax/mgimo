<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePhotoConnects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_connects', function (Blueprint $table) {
            $table->unsignedInteger('id')->nullable();
            $table->integer('connect_id');
            $table->smallInteger('type');
            $table->foreign('id')->references('id')->on('photos')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('photo_connects');
    }
}

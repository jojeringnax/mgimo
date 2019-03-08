<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MainEnCreateTablePhotoConnects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_en')->create('photo_connects', function (Blueprint $table) {
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
        Schema::connection('mysql_en')->dropIfExists('photo_connects');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MainEnCreateTableEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_en')->create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('content');
            $table->string('date');
            $table->boolean('main');
            $table->text('title');
            $table->string('location');
            $table->date('finish_date')->nullable();
            $table->unsignedInteger('main_photo_id');
        });
        Schema::connection('mysql_en')->table('events', function (Blueprint $table) {
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
        Schema::connection('mysql_en')->dropIfExists('events');
    }
}

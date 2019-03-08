<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MainEnCreateTableCongratulations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_en')->create('congratulations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->integer('date');
            $table->unsignedInteger('main_photo_id')->nullable();
            $table->tinyInteger('priority')->default(5);
            $table->boolean('moderated')->default(false);
        });

        Schema::connection('mysql_en')->table('congratulations', function (Blueprint $table) {
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
        Schema::connection('mysql_en')->table('congratulations', function (Blueprint $table) {
            $table->dropForeign('congratulations_main_photo_id_foreign');
        });
        Schema::connection('mysql_en')->dropIfExists('congratulations');
    }
}

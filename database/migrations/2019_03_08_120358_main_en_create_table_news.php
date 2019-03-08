<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MainEnCreateTableNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_en')->create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title');
            $table->text('content');
            $table->boolean('moderated');
            $table->unsignedInteger('main_photo_id')->nullable();
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
        Schema::connection('mysql_en')->table('news', function (Blueprint $table) {
            $table->dropForeign('news_main_photo_id_foreign');
        });
        Schema::connection('mysql_en')->dropIfExists('news');
    }
}

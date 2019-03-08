<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MainEnCreateTableTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_en')->create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('word');
            $table->integer('count_news')->default(0);
            $table->integer('count_photos')->default(0);
            $table->integer('count_events')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_en')->dropIfExists('tags');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MainEnCreateTableSmis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_en')->create('smis', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('link');
            $table->string('link_view');
            $table->string('title');
            $table->dateTime('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_en')->dropIfExists('smis');
    }
}

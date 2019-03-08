<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MainEnCreateTableTagConnects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_en')->create('tag_connects', function (Blueprint $table) {
            $table->unsignedInteger('id')->nullable();
            $table->unsignedInteger('connect_id');
            $table->tinyInteger('type');
            $table->foreign('id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_en')->dropIfExists('tag_connects');
    }
}

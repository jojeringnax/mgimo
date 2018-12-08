<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTagConnects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_connects', function (Blueprint $table) {
            $table->unsignedInteger('id')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('tag_connects');
    }
}

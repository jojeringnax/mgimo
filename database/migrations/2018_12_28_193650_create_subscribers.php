<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 64);
            $table->string('email', 64);
            $table->tinyInteger('course');
            $table->string('faculty', 32);
            $table->string('work', 256);
            $table->string('post',64);
            $table->boolean('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscribers');
    }
}

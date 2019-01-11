<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TashkentCreateTableProgramm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('tashkent')->create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('date');
            $table->time('time_from')->nullable();
            $table->time('time_to')->nullable();
            $table->boolean('all_day');
            $table->string('pre_title', 64)->nullable();
            $table->string('title', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('tashkent')->drop('events');
    }
}

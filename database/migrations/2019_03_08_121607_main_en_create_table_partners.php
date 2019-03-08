<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MainEnCreateTablePartners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_en')->create('partners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link');
            $table->string('position');
            $table->string('title', 64)->nullable();
            $table->tinyInteger('priority');
            $table->unsignedInteger('photo_id')->nullable();
            $table->tinyInteger('type')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_en')->dropIfExists('partners');
    }
}

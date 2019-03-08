<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MainEnCreateTableBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_en')->create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title');
            $table->text('description');
            $table->unsignedInteger('cover_photo_id')->nullable();
            $table->text('link')->nullable();
            $table->integer('status')->default(0);
            $table->integer('price')->default(0);
        });
        Schema::connection('mysql_en')->table('books', function (Blueprint $table) {
            $table->foreign('cover_photo_id')->references('id')->on('photos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_en')->table('books', function (Blueprint $table) {
            $table->dropForeign('books_cover_photo_id_foreign');
        });
        Schema::connection('mysql_en')->dropIfExists('books');
    }
}

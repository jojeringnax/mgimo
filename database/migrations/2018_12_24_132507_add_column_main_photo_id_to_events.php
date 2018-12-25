<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnMainPhotoIdToEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->addColumn('integer', 'main_photo_id')->unsigned()->nullable();
        });
        Schema::table('events', function (Blueprint $table) {
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
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign('events_main_photo_id_foreign');
            $table->dropColumn('main_photo_id');
        });
    }
}

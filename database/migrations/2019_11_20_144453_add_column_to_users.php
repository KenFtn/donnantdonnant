<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('path_avatar');
            $table->integer('city_id')->unsigned();
            $table->float('note');
            $table->foreign('city_id')
            ->references('id')->on('cities')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('city_id');
            $table->dropColumn('city_id');
            $table->dropColumn('path_avatar');
            $table->dropColumn('note');
        });
    }
}

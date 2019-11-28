<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('type');
            $table->string('status');
            $table->integer('city_id')->unsigned();
            $table->integer('price');
            $table->string('title');
            $table->longText('desc');
            $table->string('slug');
            $table->bigInteger('author_id')->unsigned();
            $table->bigInteger('user_id')->unsigned()->nullable();
        });

        Schema::table('ads', function(Blueprint $table) {
            $table->foreign('author_id')
            ->references('id')->on('users')
            ->onDelete('restrict');
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('restrict');
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
        Schema::table('ads', function (Blueprint $table) {
            $table->dropForeign('author_id');
            $table->dropColumn('author_id');
            $table->dropForeign('user_id');
            $table->dropColumn('user_id');
            $table->dropForeign('city_insee');
            $table->dropColumn('city_insee');
        });
        Schema::dropIfExists('ads');
    }
}

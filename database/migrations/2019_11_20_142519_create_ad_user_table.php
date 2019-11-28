<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('ad_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('ad_id')
            ->references('id')
            ->on('ads')
            ->ondelete('restrict')
            ->nullable();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->ondelete('restrict')
            ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ad_users', function (Blueprint $table) {
            $table->dropForeign('ad_id');
            $table->dropColumn('ad_id');
            $table->dropForeign('user_id');
            $table->dropColumn('user_id');
        });
        Schema::dropIfExists('ad_user');
    }
}

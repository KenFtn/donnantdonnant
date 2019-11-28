<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussionsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussions_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('discussions_id')->unsigned()->nullable();
            $table->bigInteger('users_id')->unsigned()->nullable();
            $table->foreign('discussions_id')
            ->references('id')
            ->on('discussions')
            ->ondelete('restrict')
            ->nullable();
            $table->foreign('users_id')
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
        Schema::table('discussions_users', function (Blueprint $table) {
            $table->dropForeign('dicussions_id');
            $table->dropColumn('discussions_id');
            $table->dropForeign('users_id');
            $table->dropColumn('users_id');
        });
        Schema::dropIfExists('discussions_users');
    }
}

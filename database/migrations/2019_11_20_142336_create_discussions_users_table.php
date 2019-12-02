<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussionUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussion_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('discussion_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('discussion_id')
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
        Schema::table('discussion_user', function (Blueprint $table) {
            $table->dropForeign('dicussion_id');
            $table->dropColumn('discussion_id');
            $table->dropForeign('users_id');
            $table->dropColumn('users_id');
        });
        Schema::dropIfExists('discussion_user');
    }
}

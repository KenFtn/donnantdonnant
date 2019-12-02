<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageDiscussionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_discussion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('message_id')->unsigned()->nullable();
            $table->foreign('message_id')
            ->references('id')
            ->on('messages')
            ->ondelete('restrict')
            ->nullable();
            $table->bigInteger('discussion_id')->unsigned()->nullable();
            $table->foreign('discussion_id')
            ->references('id')
            ->on('discussions')
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
        Schema::table('message_discussion', function (Blueprint $table) {
            $table->dropForeign('message_id');
            $table->dropColumn('message_id');
            $table->dropForeign('discussion_id');
            $table->dropColumn('discussion_id');
        });
        Schema::dropIfExists('message_discussion');
    }
}

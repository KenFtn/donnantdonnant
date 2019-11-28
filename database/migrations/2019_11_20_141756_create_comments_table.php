<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->longText('content')->nullable();
            $table->bigInteger('author_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('note');
        });

        Schema::table('comments', function(Blueprint $table) {
            $table->foreign('author_id')
            ->references('id')
            ->on('users')
            ->onDelete('restrict');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('author_id');
            $table->dropColumn('author_id');
            $table->dropForeign('user_id');
            $table->dropColumn('user_id');
        });
        Schema::dropIfExists('comments');
    }
}

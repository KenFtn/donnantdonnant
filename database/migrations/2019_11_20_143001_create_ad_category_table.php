<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->bigInteger('ad_id')->unsigned()->nullable();
            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->ondelete('restrict')
            ->nullable();
            $table->foreign('ad_id')
            ->references('id')
            ->on('ads')
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
        Schema::table('ad_category', function (Blueprint $table) {
            $table->dropForeign('ad_id');
            $table->dropColumn('ad_id');
            $table->dropForeign('category_id');
            $table->dropColumn('category_id');
        });
        Schema::dropIfExists('ad_category');
    }
}

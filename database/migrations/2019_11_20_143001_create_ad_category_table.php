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
        Schema::create('ads_categories', function (Blueprint $table) {
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
        Schema::table('ads_categories', function (Blueprint $table) {
            $table->dropForeign('ads_id');
            $table->dropColumn('ads_id');
            $table->dropForeign('categories_id');
            $table->dropColumn('categories_id');
        });
        Schema::dropIfExists('ads_categories');
    }
}

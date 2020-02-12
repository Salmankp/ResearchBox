<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('sellarticles', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('researchpaper_id')->nullable();
          $table->unsignedInteger('researcher_id')->nullable();
          $table->unsignedInteger('searcher_id')->nullable();
          $table->string('article_name');
          $table->string('researcher_name');
          $table->string('researcher_email');
          $table->string('searcher_name');
          $table->string('searcher_email');
          $table->integer('searcher_account_number');
          $table->integer('article_price');


          $table->timestamps();


          $table->foreign('researchpaper_id')->references('id')->on('researchpapers');
          $table->foreign('researcher_id')->references('id')->on('researchers');
          $table->foreign('searcher_id')->references('id')->on('searchers');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sell_articles');
    }
}

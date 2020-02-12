<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('assistances', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('searcher_id')->nullable();
          $table->unsignedInteger('researcher_id')->nullable();
          $table->string('searcher_name');
          $table->string('searcher_email');
          $table->integer('searcher_phone');
          $table->string('searcher_qualification');
          $table->string('assistance_name');
          $table->string('assistance_description');
          $table->string('file');

          $table->timestamps();

          $table->foreign('searcher_id')->references('id')->on('searchers');
          $table->foreign('researcher_id')->references('id')->on('researchers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assistances');
    }
}

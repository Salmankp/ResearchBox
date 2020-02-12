<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('researcher_id')->nullable();
            $table->unsignedInteger('searcher_id')->nullable();
            $table->string('researcher_name');
            $table->string('email');
            $table->string('phone');
            $table->string('designation');
            $table->string('survey_name');
            $table->string('type');
            $table->string('file');
            $table->timestamps();

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
        Schema::dropIfExists('surveys');
    }
}

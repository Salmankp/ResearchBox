<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('searchers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('researcher_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('profile_pic')->default('default.png');
            $table->rememberToken();
            $table->timestamps();

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
        Schema::dropIfExists('searchers');
    }
}

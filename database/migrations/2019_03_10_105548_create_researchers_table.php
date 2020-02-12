<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('researchers', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('address');
          $table->string('dob');
          $table->string('phone');
          $table->string('zip_code');
          $table->string('email')->unique();
          $table->string('password');
          $table->string('organization');
          $table->string('experience');
          $table->string('category');
          $table->string('position');
          $table->string('area');
          $table->string('major');
          $table->string('type');
          $table->string('description');
          $table->string('profile_pic')->default('default.png');
          $table->string('verifyToken');
          $table->boolean('status')->default('0');
          $table->timestamp('email_verified_at')->nullable();
          $table->rememberToken();
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('researchers');
    }
}

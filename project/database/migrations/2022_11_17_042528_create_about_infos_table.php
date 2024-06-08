<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_infos', function (Blueprint $table) {
            $table->id();
            $table->string('cv_question')->nullable();
            $table->string('cv_title')->nullable();
            $table->string('cv_description')->nullable();
            $table->string('mycv')->nullable();
            $table->string('myname')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('social')->nullable();
            $table->string('social_link')->nullable();
            $table->string('my_avatar')->nullable();
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
        Schema::dropIfExists('about_infos');
    }
}

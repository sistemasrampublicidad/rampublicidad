<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsLogos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_logos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment');
            $table->string('status')->default('available');
            $table->string('type');
            $table->integer('logo_id')->unsigned();
            $table->foreign('logo_id')->references('id')->on('logos')->onDelete('cascade');
            $table->integer('commentator_id')->unsigned();
            $table->foreign('commentator_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('comments_logos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsPlannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_planners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('idea')->nullable();
            $table->string('description')->nullable();
            $table->string('post_reason')->nullable();
            $table->string('platform')->nullable();
            $table->longText('caption')->nullable();
            $table->string('extension')->nullable();
            $table->string('is_approved')->default('no');
            $table->integer('planner_id')->unsigned();
            $table->foreign('planner_id')->references('id')->on('planners')->onDelete('cascade');
            $table->integer('branding_id')->unsigned();
            $table->foreign('branding_id')->references('id')->on('brandings')->onDelete('cascade');
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
        Schema::dropIfExists('details_planners');
    }
}

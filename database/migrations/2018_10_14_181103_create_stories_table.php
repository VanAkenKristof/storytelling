<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('race_id');
            $table->foreign('race_id')->references('id')->on('races');

            $table->unsignedInteger('class_id');
            $table->foreign('class_id')->references('id')->on('classes');

            $table->unsignedInteger('sub_class_id');
            $table->foreign('sub_class_id')->references('id')->on('sub_classes');

            $table->unsignedInteger('background_id');
            $table->foreign('background_id')->references('id')->on('backgrounds');

            $table->text('name');
            $table->integer('age');
            $table->text('story');
            $table->text('ip_address');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stories');
    }
}

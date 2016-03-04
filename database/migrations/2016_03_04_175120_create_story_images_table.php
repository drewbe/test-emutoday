<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoryImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('story_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('story_id');
            $table->boolean('is_active')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->string('image_name')->unique();
            $table->string('image_path');
            $table->string('caption');
            $table->text('teaser');
            $table->text('moretext');
            $table->string('image_extension', 10);
            $table->string('mobile_image_name')->unique();
            $table->string('mobile_image_path');
            $table->string('mobile_extension', 10);
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
        Schema::drop('story_images');
    }
}

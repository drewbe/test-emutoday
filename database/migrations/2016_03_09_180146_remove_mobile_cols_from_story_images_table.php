<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveMobileColsFromStoryImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('story_images', function (Blueprint $table) {
               $table->dropColumn(['mobile_image_name','mobile_image_path','mobile_extension']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('story_images', function (Blueprint $table) {
            $table->string('mobile_image_name')->unique();
            $table->string('mobile_image_path');
            $table->string('mobile_extension', 10);
        });
    }
}

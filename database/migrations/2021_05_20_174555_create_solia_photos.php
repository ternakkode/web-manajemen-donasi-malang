<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoliaPhotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solia_photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('solia_id');
            $table->string('solia_photo_url', 255);
            $table->boolean('is_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solia_photos');
    }
}

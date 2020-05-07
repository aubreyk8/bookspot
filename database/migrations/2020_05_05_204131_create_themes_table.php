<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string('theme')->default('fisher');
            $table->string('primary_color');
            $table->string('secondary_color');
            $table->string('icon_color');
            $table->json('cover_image_height');
            $table->json('secondary_image_height');
            $table->string('font_color')->default('FFFFFF');
            $table->bigInteger('book_id', false, true);
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
        Schema::dropIfExists('themes');
    }
}

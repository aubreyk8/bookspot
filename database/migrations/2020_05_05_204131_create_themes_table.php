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
            $table->string('primary_color')->default('0000cc');
            $table->string('secondary_color')->default('FED600');
            $table->string('icon_color')->default('CD483E');
            $table->string('cover_image_height')->default(300);
            $table->string('cover_image_width')->default(300);
            $table->string('secondary_image_height')->default(300);
            $table->string('secondary_image_width')->default(300);
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

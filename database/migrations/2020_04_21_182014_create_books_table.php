<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('sub_title', 255);
            $table->string('promotional_title', 255);
            $table->string('description', 300);
            $table->boolean('status')->default(false);
            $table->double('price');
            $table->bigInteger('category_id', false, true);
            $table->string('slug')->index()->unique();
            $table->string('isbn')->index()->unique();
            $table->string('cover_image');
            $table->bigInteger('user_id', false, true);
            $table->softDeletes();
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
        Schema::dropIfExists('books');
    }
}

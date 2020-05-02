<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->string('continent');
            $table->string('continent_code');
            $table->string('country');
            $table->string('country_code');
            $table->string('region_name');
            $table->string('region');
            $table->string('lat');
            $table->string('lon');
            $table->boolean('mobile');
            $table->boolean('proxy');
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
        Schema::dropIfExists('visitors');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExtendStringColumnLengthReviewTestimonial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reviewers', function (Blueprint $table) {
            $table->text('message', 1000)->change();
        });

        Schema::table('testimonials', function (Blueprint $table) {
           $table->text('message', 1000)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reviewers', function (Blueprint $table) {
           $table->string('message')->change();
        });

       Schema::table('testimonials', function (Blueprint $table) {
           $table->string('message')->change();
        });
    }
}

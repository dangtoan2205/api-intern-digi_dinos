<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title_vi', 50);
            $table->string('title_ja', 50);
            $table->string('title_en', 50);
            $table->string('content_vi', 255);
            $table->string('content_ja', 255);
            $table->string('content_en', 255);
            $table->string('url_image', 255);
            $table->tinyInteger('status')->comment('0: hide, 1: show')->default(0);
            $table->bigInteger('category_post_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('post', function (Blueprint $table) {
            $table->foreign('category_post_id')->references('id')->on('category_post')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title_vi');
            $table->string('title_en');
            $table->string('title_ja');
            $table->string('name_vi');
            $table->string('name_en');
            $table->string('name_ja');
            $table->text('des_vi');
            $table->text('des_en');
            $table->text('des_ja');
            $table->tinyInteger('status')->comment('0: hide, 1: show')->default(0);
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
        Schema::dropIfExists('services');
    }
}

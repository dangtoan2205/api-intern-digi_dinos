<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('recruitment_position_id')->unsigned();
            $table->foreign('recruitment_position_id')->references('id')->on('recruitment_positions')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title_vi');
            $table->string('title_en');
            $table->string('title_ja');
            $table->double('salary');
            $table->dateTime('post_date');
            $table->dateTime('expired_date');
            $table->text('des_vi');
            $table->text('des_en');
            $table->text('des_ja');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('recruitments');
    }
}

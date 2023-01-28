<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text("question");
            $table->string("image_url");
            $table->string("answer_1");
            $table->string("answer_2");
            $table->string("answer_3");
            $table->string("answer_4");
            $table->integer("position")->unsigned();
            $table->string("correct_answer");
            $table->integer("quiz_id")->unsigned()->nullable();
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
        Schema::dropIfExists('questions');
    }
};

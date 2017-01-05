<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('slip_id')->unsigned()->nullable();
            $table->integer('article_id')->unsigned()->nullable();
            $table->string('order')->nullable();
            $table->string('scribe')->nullable();
            $table->string('explanation')->nullable();
            $table->text('character_pic')->nullable();
            $table->timestamps();

            //foreign key
          $table->foreign('slip_id')->references('id')->on('slips');
        $table->foreign('article_id')->references('id')->on('articles');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}

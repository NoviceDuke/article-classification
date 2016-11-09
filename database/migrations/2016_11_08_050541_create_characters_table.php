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
            $table->intger('slip_id')->unsigned()->nullable();
            $table->intger('article_id')->unsigned()->nullable();
            $table->timestamps();
        });
        //foreign key
        $table->foreign('slip_id')->references('id')->on('silps');
        $table->foreign('article_id')->references('id')->on('articles');
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

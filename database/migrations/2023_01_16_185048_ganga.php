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
        Schema::create('gangas', function(BluePrint $tabla) {
            $tabla->id();
            $tabla->string('title');
            $tabla->text('description');
            $tabla->text('url');
            $tabla->bigInteger('category')->unsigned()->nullable();
            $tabla->foreign('category')->references('id')->on('categories');
            $tabla->integer('likes')->unsigned();
            $tabla->integer('unlikes')->unsigned();
            $tabla->float('price')->unsigned();
            $tabla->float('price_sale')->unsigned();
            $tabla->boolean('available');
            $tabla->bigInteger('user_id')->unsigned()->nullable();
            $tabla->foreign('user_id')->references('id')->on('users');
            $tabla->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTattoosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tattoos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('price', 18, 2);
            $table->integer('tattoos_categories_id')->unsigned();
            $table->timestamps();

            $table->foreign('tattoos_categories_id')->references('id')->on('tattoos_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tattoos');
    }
}

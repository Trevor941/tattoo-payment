<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiercingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piercings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('price', 18, 2);
            $table->integer('piercing_categories_id')->unsigned();
            $table->timestamps();

            $table->foreign('piercing_categories_id')->references('id')->on('piercing_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('piercings');
    }
}

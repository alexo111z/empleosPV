<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelacionTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relacion_tags', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('id_usuario')->nullable()->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');;

            $table->bigInteger('id_oferta')->nullable()->unsigned();
            $table->foreign('id_oferta')->references('id')->on('ofertas')->onDelete('cascade');

            $table->bigInteger('id_tag')->unsigned();
            $table->foreign('id_tag')->references('id')->on('tags');

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
        Schema::dropIfExists('relacion_tags');
    }
}

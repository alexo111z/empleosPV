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
            $table->foreign('id_usuario')->references('id')->on('users');

            $table->bigInteger('id_oferta')->nullable()->unsigned();
            $table->foreign('id_oferta')->references('id')->on('ofertas');

            $table->bigInteger('id_tag');
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

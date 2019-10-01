<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('id_emp')->unsigned();
            $table->foreign('id_emp')->references('id')->on('empresas');

            $table->string('titulo', 70);
            $table->string('d_corta', 142);
            $table->string('d_larga', 900);
            $table->string('salario', 5);
            $table->string('t_contrato', 30)->nullable();
            $table->dateTime('vigencia');

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
        Schema::dropIfExists('ofertas');
    }
}

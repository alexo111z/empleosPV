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
           $table->foreign('id_emp')->references('id')->on('empresas')->onDelete('cascade');;
            $table->string('titulo', 70);
            $table->string('d_corta', 142);
            $table->string('d_larga', 900);
            $table->decimal('salario', 7, 2)->nullable();
            $table->string('t_contrato', 30)->nullable();
            $table->dateTime('vigencia');
            $table->boolean('existe');
            //Direccion
            $table->bigInteger('id_pais')->nullable()->unsigned();
            $table->foreign('id_pais')->references('id')->on('paises');
            $table->bigInteger('id_estado')->nullable()->unsigned();
            $table->foreign('id_estado')->references('id')->on('estado');
            $table->bigInteger('id_ciudad')->nullable()->unsigned();
            $table->foreign('id_ciudad')->references('id')->on('municipios');

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

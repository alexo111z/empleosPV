<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 150);
            $table->string('password');
            $table->string('rfc', 13)->unique();

            $table->string('d_fiscal');
            
            $table->bigInteger('id_pais')->nullable()->unsigned();
            $table->foreign('id_pais')->references('id')->on('paises');
            $table->bigInteger('id_estado')->nullable()->unsigned();
            $table->foreign('id_estado')->references('id')->on('estado');
            $table->bigInteger('id_ciudad')->nullable()->unsigned();
            $table->foreign('id_ciudad')->references('id')->on('municipios');
            /*$table->string('pais', 100);
            $table->string('estado', 100);
            $table->string('ciudad', 100);*/

            $table->string('email', 320)->unique();
            $table->string('telefono', 10);
            $table->string('contacto', 150);

            $table->bigInteger('id_social')->unsigned();
            $table->foreign('id_social')->references('id')->on('rsociales');

            $table->bigInteger('id_giro')->unsigned();
            $table->foreign('id_giro')->references('id')->on('giros');

            $table->string('logo')->nullable(); //direccion del logo

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('empresas');
    }
}

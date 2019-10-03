<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email', 320)->unique();
            $table->string('password');
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->dateTime('nacimiento');
            $table->boolean('genero');

            $table->bigInteger('id_estudios')->unsigned();
            $table->foreign('id_estudios')->references('id')->on('nestudios');

            $table->bigInteger('id_area')->nullable()->unsigned();
            $table->foreign('id_area')->references('id')->on('area');

            $table->string('direccion')->nullable();
            $table->string('telefono', 10)->nullable();
            $table->string('conocimientos', 900)->nullable();
            $table->string('foto')->nullable();
            $table->string('curriculum')->nullable();

            $table->integer('edad');

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
        Schema::dropIfExists('users');
    }
}

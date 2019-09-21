<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 50);
            $table->string('apellidos', 100);
            $table->string('correo')->unique();
            $table->string('telefono')->unique();
            $table->unsignedBigInteger('tipo_persona_id'); //relacion con tipo de persona (Cliente o Proveedor)
            $table->foreign('tipo_persona_id')->references('id')->on('tipo_personas');
            
            $table->unsignedBigInteger('id_tipo_documentoID'); //relacion con tipo de persona (Cliente o Proveedor)
            $table->foreign('id_tipo_documentoID')->references('id')->on('tipo_documento_identidads');
            
            
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
        Schema::dropIfExists('personas');
    }
}

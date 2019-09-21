<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('serie_comprobante',50);
            $table->string('numero_comprobante',50);
            $table->decimal('impuesto',8,2);
            $table->decimal('total',8,2);

            //relacion con los clientes
            $table->unsignedBigInteger('id_cliente'); 
            $table->foreign('id_cliente')->references('id')->on('personas');

            
            //relacion con el usuario que hace la venta
            $table->unsignedBigInteger('id_usuario'); 
            $table->foreign('id_usuario')->references('id')->on('users');
            
            
            //relacion con el tipo de documento(factura,boleta)
            $table->unsignedBigInteger('id_tipo_documento'); 
            $table->foreign('id_tipo_documento')->references('id')->on('tipo_documento_ventas');
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
        Schema::dropIfExists('ventas');
    }
}

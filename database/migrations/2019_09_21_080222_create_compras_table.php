<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('serie_comprobante',50);
            $table->string('numero_comprobante',50);
            $table->decimal('impuesto',8,2);
            $table->decimal('total',8,2);
            
            //estado actual de la compra, para poder validar cuando agregar la compra a los articulos.
            $table->unsignedBigInteger('id_estado'); 
            $table->foreign('id_estado')->references('id')->on('estado_compras');
            
            
            //relacion con los proveedores
             $table->unsignedBigInteger('id_proveedor'); 
             $table->foreign('id_proveedor')->references('id')->on('personas');
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
        Schema::dropIfExists('compras');
    }
}

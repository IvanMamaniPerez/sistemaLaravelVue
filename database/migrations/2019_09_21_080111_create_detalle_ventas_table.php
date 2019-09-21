<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cantidad');
            $table->decimal('precio_venta',8,2);
            $table->decimal('descuento',8,2);

            //relacion con el articulo
            $table->unsignedBigInteger('id_articulo'); 
            $table->foreign('id_articulo')->references('id')->on('articulos');

            //relacion con la venta
            $table->unsignedBigInteger('id_venta'); 
            $table->foreign('id_venta')->references('id')->on('ventas');

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
        Schema::dropIfExists('detalle_ventas');
    }
}

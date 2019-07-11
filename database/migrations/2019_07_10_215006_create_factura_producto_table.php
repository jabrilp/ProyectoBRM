<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_producto', function (Blueprint $table) {
            $table->bigIncrements('fapr_id');
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('factura_id');
            $table->integer('fapr_cantidad');

            $table->timestamps();

            $table->foreign('producto_id')->references('prod_id')->on('producto');
            $table->foreign('factura_id')->references('fact_id')->on('factura');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura_producto');
    }
}

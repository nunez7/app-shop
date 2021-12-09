<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_details', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            //Fk carrito
            $table->integer('cart_id')->unsigned();
            $table->foreign('cart_id')->references('id')->on('carts');
            //Fk producto
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            //Cantidad
            $table->integer('quantity');
            //Price
            $table->float('price', 5,2);
            //Descuento
            $table->integer('discount')->default(0); //% int
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
        Schema::dropIfExists('cart_details');
    }
}

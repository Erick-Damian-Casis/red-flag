<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

            $table->foreignId('category_id')
                ->constrained('categories');

            $table->string('name')->comment('nombre del producto');
            $table->float('price')->comment('costo del producto por unidad');
            $table->string('image')->comment('Imagen del producto');
            $table->string('stock')->comment('Cantidad disponible');
            $table->text('description')->comment('Descripcion del producto');
            $table->boolean('state')->comment('estado del producto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

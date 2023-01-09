<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

            $table->foreignId('user_id')
                ->constrained('users');

            $table->foreignId('product_id')
                ->constrained('products');

            $table->foreignId('size_id')
                ->constrained('catalogues');

            $table->foreignId('color_id')
                ->constrained('catalogues');

            $table->float('total_price')->comment('precio por cantidad');
            $table->float('amount')->comment('cantidad de producto solicitado');
            $table->boolean('state')->comment('estado de carrito true->comprado false->pendiente');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}

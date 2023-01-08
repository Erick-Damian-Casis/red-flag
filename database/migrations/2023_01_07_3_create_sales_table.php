<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

            $table->foreignId('car_id')
                ->constrained('cars');

            $table->string('invoice')->comment('Numero de factura');
            $table->float('description')->comment('descripcion sobre la venta');
            $table->float('iva')->comment('Impuesto sobre el Valor Añadido');
            $table->date('sale_at')->comment('fecha de compra');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}

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

            $table->foreignId('product_id')
                ->constrained('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('size_id')
                ->constrained('catalogues')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('color_id')
                ->constrained('catalogues')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('sale_id')
                ->nullable()
                ->constrained('sales')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->float('total_price')->comment('precio por cantidad');
            $table->float('amount')->comment('cantidad de producto solicitado');
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

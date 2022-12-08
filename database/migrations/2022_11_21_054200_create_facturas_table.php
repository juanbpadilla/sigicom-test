<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table -> bigIncrements('id');
            $table -> date('fecha_venta')->nullable(false);
            $table -> integer('cantidad_producto');
            $table -> string('descripcion')->nullable(false);
            $table -> decimal('precio_unitario', $precision=(10),$escala=(3))->nullable(false);
            $table -> decimal('total_venta', $precision=(10),$escala=(3))->nullable(false);

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('users');

            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table -> rememberToken();
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
};

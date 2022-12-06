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
            $table -> date('fecha_factura')->nullable(false);
            $table -> integer('precio_unitario');
            $table -> integer('cantidad_producto');
            $table -> decimal('total', $precision=(10),$escala=(3))->nullable(false);
            $table -> string('descripcion')->nullable(false);
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

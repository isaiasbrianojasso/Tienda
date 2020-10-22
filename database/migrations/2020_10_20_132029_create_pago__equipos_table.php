<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagoEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago__equipos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user')->nullable();
            $table->integer('id_cliente')->nullable();
            $table->string('id_equipo')->nullable();
            $table->string('id_servicio')->nullable();
            $table->string('id_sucursal')->nullable();
            $table->string('id_caja')->nullable();
            $table->string('id_corte')->nullable();
            $table->float('monto')->nullable();//adelanto
            $table->float('pagado')->nullable();//pagado
            $table->float('adelanto')->nullable();
            $table->string('comentario')->nullable();
            $table->date('fecha')->nullable();
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
        Schema::dropIfExists('pago__equipos');
    }
}
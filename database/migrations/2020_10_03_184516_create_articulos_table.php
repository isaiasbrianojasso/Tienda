<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('id_marca')->nullable();
            $table->string('categoria')->nullable();//categoria
            $table->string('IDlocal')->nullable();//id local del articulo
            $table->string('talla')->nullable();//talla
            $table->string('descripcion')->nullable();
            $table->string('existencia')->nullable();
            //descuento e iva... se borraran
            $table->float('precio')->nullable();
            $table->integer('precioOriginal')->nullable();
            $table->string('imagena')->nullable();
            $table->string('imagenb')->nullable();
            $table->string('imagenc')->nullable();
            $table->string('imagend')->nullable();
            $table->float('descuento')->nullable();
            $table->float('iva')->nullable();
            $table->float('id_proveedor')->nullable();
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
        Schema::dropIfExists('articulos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Prestamos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('libro_id');
            $table->unsignedBigInteger('cliente_id');
            $table->timestamp('fecha_prestamo')->nullable();
            $table->integer('dias_prestamo')->unsigned()->nullable()->default(12);
            $table->string('estado');

            $table->foreign('libro_id')->references('id')->on('libros')->onUpdate('cascade')->onDelete("cascade");
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
}

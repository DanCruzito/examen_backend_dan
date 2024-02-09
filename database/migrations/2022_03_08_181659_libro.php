<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Libro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function(Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->unsignedBigInteger('autor_id'); //LLAVE FORÁNEA 
            $table->string('lote');
            $table->text('description');
            
            $table->foreign('autor_id')->references('id')->on('autors')->onUpdate('cascade')->onDelete("cascade");
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
        Schema::dropIfExists('libros');
    }
}

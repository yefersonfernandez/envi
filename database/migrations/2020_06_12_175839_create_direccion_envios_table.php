<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionenviosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccionenvios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion');
            $table->unsignedBigInteger('ciudad_id');
            $table->unsignedBigInteger('cliente_id');
            $table->timestamps();
            $table->foreign('ciudad_id')->references('id')->on('ciudads');
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Direccionenvios');
    }
}

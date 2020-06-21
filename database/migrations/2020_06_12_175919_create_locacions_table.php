<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('longitud',14,7);
            $table->float('latitud',14,7);
            $table->unsignedBigInteger('Direccionenvio_id');
            $table->timestamps();
            $table->foreign('Direccionenvio_id')->references('id')->on('direccionenvios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locacions');
    }
}

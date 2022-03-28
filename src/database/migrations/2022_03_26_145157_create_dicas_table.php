<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dicas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
            $table->string('marca', 100);
            $table->string('modelo', 100);
            $table->string('versao', 100)->nullable();
            $table->text('descricao');
            $table->unsignedInteger('veiculo_id');
            $table->foreign('veiculo_id')->references('id')->on('veiculos')->onDelete('cascade');
            $table->unsignedInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dicas');
    }
}

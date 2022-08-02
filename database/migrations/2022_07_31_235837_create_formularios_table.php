<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formularios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idServico');
            $table->String('nomeOS');
            $table->integer('nivel')->default(5);
            $table->dateTime('dataHoraSolicitacao')->default(now());
            $table->Boolean('realizada')->default(false);
            $table->String('descricao');
            $table->String('local');
            $table->String('caminhoAnexo')->nullable(true);
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
        Schema::dropIfExists('formularios');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produto_detalhes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->float('comprimento', 8, 2);
            $table->float('largura', 8, 2);
            $table->float('altura', 8, 2);
            $table->timestamps();

            //constraint de relacionamento(chave estrangeira)
            //no método foreing definimos qual é a coluna que vai receber a chave estrangeira
            //método references indicamos qual é a coluna de referencia
            //no método ON indicamos qual é a tabela
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->unique('produto_id'); //no método unique não permite valores repitidos na chave estrangeira
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto_detalhes');
    }
};

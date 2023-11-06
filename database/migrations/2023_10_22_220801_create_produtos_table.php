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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->text('descricao')->nullable(); //nullable permite valores nulos
            $table->integer('peso')->nullable();
            $table->float('preco_venda', 8, 2)->default(0.01); //default traz um valor padrão caso não seja cadastrado o preço de venda, nesse caso será 1 centavo
            $table->integer('estoque_minimo')->default(1); //Por default estoque minimo é 1
            $table->integer('estoque_maximo')->default(1); //por default estoque maxímo é 1
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};

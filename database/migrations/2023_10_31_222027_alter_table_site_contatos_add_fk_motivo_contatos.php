<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            //Adicionando a coluna motivo_contatos_id
            //chaves primarias são criadas com o tipo unsignedBigInteger()
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        // Statement permite executar uma query no banco de dados
        //atribuindo motivo_contato para a nova coluna motivo_contatos_id
        DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        //criação da FK e removendo a coluna motivo contato
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //criar a coluna motivo_contato e na sequencia removendo a fk
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });

         //atribuindo motivo_contatos_id para a nova coluna motivo_contato
         DB::statement('update site_contatos set motivo_contato = motivo_contatos_id');

         //removendo a coluna motivo_contatos_id
         Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });

    }
};

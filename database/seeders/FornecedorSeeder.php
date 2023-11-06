<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;


class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 300';
        $fornecedor->site = 'www.fornecedor300.com.br';
        $fornecedor->uf = 'RJ';
        $fornecedor->email = 'fornecedor300@gmail.com.br';
        $fornecedor->save();

        Fornecedor::create([
            //o método create (atenção para o atributo fillable da classe)
            'nome' => 'Fornecedor 200',
            'site' => 'www.fornecedor200.com.br',
            'uf' => 'BH',
            'email' => 'fornecedor@gmail.com.br'
        ]);



    }

}

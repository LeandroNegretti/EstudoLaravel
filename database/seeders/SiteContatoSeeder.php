<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;
use Carbon\Factory;
use Database\Factories\SiteContatoFactory;



class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        $contato = new SiteContato();
        $contato->nome = 'Lucas';
        $contato->telefone = '94858585949';
        $contato->email = 'lucasSilva@gmail.com';
        $contato->motivo_contato = 2;
        $contato->mensagem = 'Muito bom o conteudo do site';
        $contato->save();
        */

        SiteContatoFactory::new()->count(100)->create();
    }
}

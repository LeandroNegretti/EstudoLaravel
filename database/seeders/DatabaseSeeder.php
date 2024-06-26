<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\MotivoContato;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(MotivoContatoSeeder::class);
        $this->call(SiteContatoSeeder::class);
        $this->call(FornecedorSeeder::class);
    }
}

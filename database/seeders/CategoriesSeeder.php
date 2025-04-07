<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //  Criando sementes no Banco de Dados
        DB::table('categories')->insert([
            'name' => 'Electronicos',
            'slug' => 'eletronicos'
        ]);
    }
}

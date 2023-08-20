<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['libelle' => 'tissu'],
            ['libelle' => 'boutton'],
            ['libelle' => 'aiguille'],
            ['libelle' => 'fil'],
            ['libelle' => 'ciseaux'],
        ];
        DB::table('categories')->insert($categories);
    }
}

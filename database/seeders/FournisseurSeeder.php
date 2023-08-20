<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FournisseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fournisseurs = [
            ['libelle' => 'siraa'],
            ['libelle' => 'moussaa'],
            ['libelle' => 'kadiaaa'],
            ['libelle' => 'breukh'],
        ];
        DB::table('fournisseurs')->insert($fournisseurs);
    }
}

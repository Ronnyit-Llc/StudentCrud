<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table("classes")->insert([
        ['libelle' => "6eme"],
        ['libelle' => "5eme"],
        ['libelle' => "4eme"],
        ['libelle' => "3eme"],
        ['libelle' => "2nd"],
        ['libelle' => "1ere"],
        ['libelle' => "Terminale"]
    ]);
    }
}

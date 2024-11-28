<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $genres = [
            ['name' => 'Action'],
            ['name' => 'Romance'],
            ['name' => 'Cartoon']
        ];

        foreach ($genres as $g){
            genre::create($g);
        }
    }
}

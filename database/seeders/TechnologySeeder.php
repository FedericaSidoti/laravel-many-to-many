<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            [
                'name' =>'css',
                'color' => '#abcdef'
            ],
            [
                'name'=>'scss',
                'color' => '#99cbff'
            ],
            [
                'name'=>'js',
                'color' => '#00A1F7'
            ],
            [
                'name'=>'vue',
                'color' => '#638EE7'
            ],
            [
                'name'=>'react',
                'color' => '#aaaaff'
            ],
            [
                'name'=>'astro',
                'color' => '#6BA9C3'
            ],
            [
                'name'=>'laravel',
                'color' => '#77A5CE'
            ],
            [
                'name'=>'node',
                'color' => '#BDD8E4'
            ],
            [
                'name'=>'angular',
                'color' => '#82ECF0'
            ],
            [
                'name'=>'C++',
                'color' => '#62C9EA'
            ],
        ];

        foreach ($technologies as $technology) {

            $new_technology = new Technology();
            $new_technology->name = $technology['name'];
            $new_technology->color = $technology['color'];
            $new_technology->slug = Str::slug($technology['name']);

            $new_technology->save();
        }
    }
}

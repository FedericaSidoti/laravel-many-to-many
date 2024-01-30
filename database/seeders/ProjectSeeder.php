<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title'=> 'Boolando',
                'thumb'=> '/storage/images/code1.jpg',
                'description' => 'Riproduzione del layout del noto sito di ecommerce Zalando'
            ],

            [
                'title'=> 'Boolzapp',
                'thumb'=> '/storage/images/code.jpg',
                'description' => 'Applicativo sviluppato con Vue.js, replicando layout e funzionalità di interazione con l\' utente del più famoso sito di messaggistica al mondo: Whatsapp'
            ],

            [
                'title'=> 'ToBoolist',
                'thumb'=> '/storage/images/image.jpg',
                'description' => 'Applicativo Front End sviluppato con Vue.js, che riproduce una semplice ma efficace lista di task e di classi, con la possibilità di aggiungerne di nuovi o cancellare quelli già effettuati.'
            ],

            [
                'title'=> 'Midterm Project',
                'thumb'=> '/storage/images/code2.jpg',
                'description' => 'Il progetto di metà corso, alla conclusione della sezione dedicata al Front End: replica sviluppata con Vue.js del Front End di un sito completo e complesso.'
            ],

            [
                'title'=> 'Boolflix',
                'thumb'=> '/storage/images/code3.webp',
                'description' => 'Replica di un applicativo Front End, realizzato con Vue.js e completo di chiamata axios ad una API pubblica. Ispirato a Netflix.'
            ],

            [
                'title'=> 'Laravel GdR',
                'thumb'=> '/storage/images/code4.jpg',
                'description' => 'Progetto Full Stack di gruppo: il Front End è realizzato con Vue.js e comunica con una API creata con Laravel. Il sito è completo di autenticazione.'
            ],
        ];

        $types = Type::all(); 
        $ids = $types->pluck('id');

        $technologies= Technology::all();
        $techIds = $technologies->pluck('id');

        foreach($projects as $project){
            $newProject = new Project(); 
            $newProject->title = $project['title'];
            $newProject->thumb = $project['thumb'];
            $newProject->description = $project['description'];
            $newProject->type_id= $ids->random();
            $newProject->slug = Str::slug($project['title']);
            
            $newProject->save();

            $newProject->technologies()->attach(
                $techIds->random(rand(1, 10))->all()
            );

        }    
    }
}

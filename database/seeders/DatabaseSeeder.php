<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Note;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create ([
            'name' => 'Lynn',
            'email' => 'lynn@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        User::create ([
            'name' => 'Ragnora',
            'email' => 'ragnora@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        User::create ([
            'name' => 'Dewi',
            'email' => 'dewipitri@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        
        Note::create ([
            'user_id' => 1,
            'title' => 'About Snail',
            'body' => 'A snail is a shelled gastropod. The name is most often applied to land snails, terrestrial pulmonate gastropod molluscs. However, the common name snail is also used for most of the members of the molluscan class Gastropoda that have a coiled shell that is large enough for the animal to retract completely into. When the word "snail" is used in this most general sense, it includes not just land snails but also numerous species of sea snails and freshwater snails. Gastropods that naturally lack a shell, or have only an internal shell, are mostly called slugs, and land snails that have only a very small shell that they cannot retract into) are often called semi-slugs.',
        ]);

        Note::create ([
            'user_id' => 1,
            'title' => 'About Cat',
            'body' => 'Cat is My Best Friend. I love Cat.',
        ]);

        Note::create ([
            'user_id' => 2,
            'title' => 'About Girraffe',
            'body' => 'Girraffe is My friend. The giraffe is a large African hoofed mammal belonging to the genus Giraffa. It is the tallest living terrestrial animal and the largest ruminant on Earth. Traditionally, giraffes were thought to be one species, Giraffa camelopardalis, with nine subspecies. Most recently, researchers proposed dividing them into up to eight extant species due to new research into their mitochondrial and nuclear DNA, as well as morphological measurements. Seven other extinct species of Giraffa are known from the fossil record. The giraffes chief distinguishing characteristics are its extremely long neck and legs, its horn-like ossicones, and its spotted coat patterns.',
        ]);

        Note::create ([
            'user_id' => 2,
            'title' => 'About Fox',
            'body' => 'Foxes are small to medium-sized, omnivorous mammals belonging to several genera of the family Canidae. They have a flattened skull, upright, triangular ears, a pointed, slightly upturned snout, and a long bushy tail ("brush"). Twelve species belong to the monophyletic "true fox" group of genus Vulpes. Approximately another 25 current or extinct species are always or sometimes called foxes; these foxes are either part of the paraphyletic group of the South  American foxes, or of the outlying group, which consists of the bat-eared fox, gray fox, and island fox.',
        ]);
    }
}

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
            'email' => 'lintang13arsa@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        
        Note::create ([
            'user_id' => 1,
            'title' => 'About Snail',
            'body' => 'Snail is My friend',
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TagSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        factory(\App\Models\Tag::class)->create([
            'name' => 'PHP',
        ]);
        factory(\App\Models\Tag::class)->create([
            'name' => 'C#',
        ]);
        factory(\App\Models\Tag::class)->create([
            'name' => 'Javascript',
        ]);

    }
}

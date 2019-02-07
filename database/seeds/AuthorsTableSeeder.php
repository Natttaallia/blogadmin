<?php

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('_authors_')->insert([
        //     ['name' => str_random(10)],
        //     ['name' => str_random(10)],
        //     ['name' => str_random(10)],
        //     ['name' => str_random(10)],
        //     ['name' => str_random(10)],
        // ]);
        factory(Author::class, 100)->create();
    }
}

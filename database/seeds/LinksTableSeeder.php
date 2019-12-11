<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('links')->insert([
            'title' => Str::random(10),
            'url' => Str::random(10).'.com',
            'description' => Str::random(10),
        ]);
    }
}

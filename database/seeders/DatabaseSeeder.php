<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Subject::insert([
            [ 'id' =>'1','name' =>'Maths'],
            [ 'id' =>'2','name' =>'Science'],
            [ 'id' =>'3','name' =>'History'],
        ]);
    }
}

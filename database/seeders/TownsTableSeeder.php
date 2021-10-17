<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TownsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         App\Movie::create([
            'name' => 'Colombo'
        ]);

        App\Movie::create([
            'name' => 'Melbourne'
        ]);
    }
}

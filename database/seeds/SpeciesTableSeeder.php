<?php

use Illuminate\Database\Seeder;

class SpeciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('species')->insert([
            'species_id' => 1,
            'species_name' => Kangaroo,
        ]);
        DB::table('species')->insert([
            'species_id' => 2,
            'species_name' => Koala,
        ]);
    }
}

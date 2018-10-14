<?php

use App\Race;
use Illuminate\Database\Seeder;

class RaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('character_options.race') as $raceName) {
            $race = new Race();
            $race->name = $raceName;
            $race->save();
        }
    }
}

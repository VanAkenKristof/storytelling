<?php

use App\Background;
use Illuminate\Database\Seeder;

class BackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('character_options.background') as $backgroundName) {
            $background = new Background();
            $background->name = $backgroundName;
            $background->save();
        }
    }
}

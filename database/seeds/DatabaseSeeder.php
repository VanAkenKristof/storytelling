<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RaceSeeder::class);
         $this->call(ClassSeeder::class);
         $this->call(BackgroundSeeder::class);

         // Comment these out for clean in stall
         $this->call(StorySeeder::class);
         $this->call(SettingsSeeder::class);
         $this->call(VoteSeeder::class);
    }
}

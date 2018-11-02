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
         $this->call(StorySeeder::class);
         $this->call(SettingsSeeder::class);
         $this->call(VoteSeeder::class);
    }
}

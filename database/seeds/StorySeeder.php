<?php

use App\Background;
use App\Race;
use App\Story;
use App\SubClass;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $user = new User();
        $user->name = 'Kristof Van Aken';
        $user->street = 'Koningin Astridplein';
        $user->number = '37/2';
        $user->postal_code = '2018';
        $user->city = 'Antwerpen';
        $user->country = 'Belgium';

        $user->email = 'kristof.vanaken@student.kdg.be';
        $user->password = bcrypt("abc123");
        $user->admin = 1;
        $user->save();

        for ($i = 0; $i < 20; $i++) {

            $subClass = $this->getRandomSubRace();

            $user = new User();
            $user->name = $faker->name;
            $user->street = $faker->streetName;
            $user->number = $faker->numberBetween(1, 500);
            $user->postal_code = $faker->postcode;
            $user->city = $faker->city;
            $user->country = $faker->country;

            $user->email = $faker->email;
            $user->password = Hash::make($faker->password);
            $user->save();

            $story = new Story();
            $story->user_id = $user->id;
            $story->race_id = $this->getRandomRace()->id;
            $story->class_id = $subClass->class->id;
            $story->sub_class_id = $subClass->id;
            $story->background_id = $this->getRandomBackground()->id;
            $story->name = $faker->name;
            $story->age = rand(14, 400);
            $story->story = $faker->text(800);
            $story->ip_address = $faker->ipv4;
            $story->save();
        }
    }

    private function getRandomSubRace()
    {
        $subClass = SubClass::all();

        return $subClass[$this->getRandomIndexOfObject($subClass)];
    }

    private function getRandomRace()
    {
        $races = Race::all();

        return $races[$this->getRandomIndexOfObject($races)];
    }

    private function getRandomBackground()
    {
        $backgrounds = Background::all();

        return $backgrounds[$this->getRandomIndexOfObject($backgrounds)];
    }

    private function getRandomIndexOfObject($object)
    {
        return rand(0, $object->count() - 1);
    }
}
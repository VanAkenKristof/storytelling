<?php

use App\ClassModel;
use App\SubClass;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('character_options.class') as $className => $subClasses) {
            $class = new ClassModel();
            $class->name = $className;
            $class->save();

            foreach ($subClasses as $subClassName) {
                $subClass = new SubClass();
                $subClass->name = $subClassName;
                $subClass->class_id = $class->id;
                $subClass->save();
            }
        }
    }
}

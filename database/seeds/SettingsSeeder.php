<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $phases = collect([
            "phase1" => [
                'start' => \Carbon\Carbon::createFromDate('2018', '11', '1')->startOfDay(),
                'end' => \Carbon\Carbon::createFromDate('2018', '11', '30')->endOfDay(),
            ],
            "phase2" => [
                'start' => \Carbon\Carbon::createFromDate('2018', '12', '1')->startOfDay(),
                'end' => \Carbon\Carbon::createFromDate('2018', '12', '31')->endOfDay(),
            ],
            "phase3" => [
                'start' => \Carbon\Carbon::createFromDate('2019', '01', '1')->startOfDay(),
                'end' => \Carbon\Carbon::createFromDate('2019', '01', '31')->endOfDay(),
            ],
            "phase4" => [
                'start' => \Carbon\Carbon::createFromDate('2019', '02', '1')->startOfDay(),
                'end' => \Carbon\Carbon::createFromDate('2019', '02', '28')->endOfDay(),
            ],
        ]);

        foreach ($phases as $phase) {
            $period = new \App\Period();
            $period->start = $phase['start'];
            $period->end = $phase['end'];

            $period->save();
        }
    }
}

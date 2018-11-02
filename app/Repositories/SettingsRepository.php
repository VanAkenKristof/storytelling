<?php

namespace App\Repositories;


use App\Period;
use Carbon\Carbon;

class SettingsRepository
{
    public function getPhases()
    {
        return Period::all();
    }

    public function editPhases($phases)
    {
        unset($phases['_token']);

        foreach ($phases as $key => $phase) {
            $period = Period::find($this->getIndex($key));

            $period->start = $this->getStart($phase);
            $period->end = $this->getEnd($phase);

            $period->save();
        }
    }

    public function getFormattedPhases()
    {
        $phases = collect();

        foreach ($this->getPhases() as $phase) {
            $phases->put($phase->id, [
                'start' => Carbon::parse($phase->start)->format('d/m/Y'),
                'end' => Carbon::parse($phase->end)->format('d/m/Y'),
            ]);
        }

        return $phases;
    }

    private function getStart($date)
    {
        $start = explode(' - ', $date)[0];

        return Carbon::createFromFormat('d/m/Y', $start)->startOfDay();
    }

    private function getEnd($date)
    {
        $end = explode(' - ', $date)[1];

        return Carbon::createFromFormat('d/m/Y', $end)->endOfDay();
    }

    private function getIndex($key)
    {
        return substr($key, -1);
    }
}

<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class TemperatureExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($temperature)
    {
        $this->temperature = $temperature;
    }

    public function view():View
    {
        return view('temperature.exportTemperature',[
            'temperature'=>$this->temperature
        ]);
    }
}

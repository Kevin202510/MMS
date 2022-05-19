<?php

use Illuminate\Database\Seeder;

class SensorconfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sensorsconfigurations')->insert([
            [
              'id'   => 1, 
              'sensor_name'  => 'Temperature Sensor',
              'sensor_limit_value'  => 30,
              'sensor_max_value'  => 20,
              'isOn'  => 0,
            ],
            [
                'id'   => 2, 
                'sensor_name'  => 'Light Sensor',
                'sensor_limit_value'  => 100,
                'sensor_max_value'  => 120,
                'isOn'  => 0,
            ],
            [
                'id'   => 3, 
                'sensor_name'  => 'Carbon Dioxide Sensor',
                'sensor_limit_value'  => 1000,
                'sensor_max_value'  => 1200,
                'isOn'  => 0,
            ],
            [
                'id'   => 4, 
                'sensor_name'  => 'Humidity Sensor',
                'sensor_limit_value'  => 70,
                'sensor_max_value'  => 80,
                'isOn'  => 0,
            ]
            ]
            );
    }
}

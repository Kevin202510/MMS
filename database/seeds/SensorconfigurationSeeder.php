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
              'configuration_name'  => 'Oyster Mushroom',
              'configuration_value'  => '{"temperatureSensorMinVal":30,"temperatureSensorMaxVal":50,"temperaturestatusval":1,"humiditylimitval":30,"humiditymaxval":50,"humiditystatusval":1,"lightlimitval":100,"lightmaxval":120,"lightstatusval":1,"co2limitval":1000,"co2maxval":1200,"co2statusval":1}',
              'isActive'  => 1,
            ],
            [
                'id'   => 2, 
                'configuration_name'  => 'Button Mushroom',
                'configuration_value'  => '{"temperatureSensorMinVal":30,"temperatureSensorMaxVal":50,"temperaturestatusval":1,"humiditylimitval":30,"humiditymaxval":50,"humiditystatusval":1,"lightlimitval":100,"lightmaxval":120,"lightstatusval":1,"co2limitval":1000,"co2maxval":1200,"co2statusval":1}',
                'isActive'  => 0,
              ],
              [
                  'id'   => 4, 
                  'configuration_name'  => 'Cup Mushroom',
                  'configuration_value'  => '{"temperatureSensorMinVal":30,"temperatureSensorMaxVal":50,"temperaturestatusval":1,"humiditylimitval":30,"humiditymaxval":50,"humiditystatusval":1,"lightlimitval":100,"lightmaxval":120,"lightstatusval":1,"co2limitval":1000,"co2maxval":1200,"co2statusval":1}',
                  'isActive'  => 0,
                ],
                [
                    'id'   => 5, 
                    'configuration_name'  => 'Portabella Mushroom',
                    'configuration_value'  => '{"temperatureSensorMinVal":30,"temperatureSensorMaxVal":50,"temperaturestatusval":1,"humiditylimitval":30,"humiditymaxval":50,"humiditystatusval":1,"lightlimitval":100,"lightmaxval":120,"lightstatusval":1,"co2limitval":1000,"co2maxval":1200,"co2statusval":1}',
                    'isActive'  => 0,
                  ]
            ]
            );
    }
}

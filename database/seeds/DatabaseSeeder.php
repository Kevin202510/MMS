<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CarbondioxidesSeeder::class,
            HumiditySeeder::class,
            LightsSeeder::class,
            RoleSeeder::class,
            SoilmoisturesSeeder::class,
            TemperatureSeeder::class,
            UsersSeeder::class,
            WaterlevelsSeeder::class,
        ]);
    }
}

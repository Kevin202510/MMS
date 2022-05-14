<?php

use Illuminate\Database\Seeder;

class SoilmoisturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('soilmoistures')->insert([
            [
              'id'   => 1, 
              'soilmoisture'  => 10000.20,
              'status' => 0,
            ],
            [
                'id'   => 2, 
                'soilmoisture'  => 10000.20,
                'status' => 0,
              ],
              [
                'id'   => 3, 
                'soilmoisture'  => 100.20,
                'status' => 0,
              ],
              [
                'id'   => 4, 
                'soilmoisture'  => 100.20,
                'status' => 0,
              ],
              [
                'id'   => 5, 
                'soilmoisture'  => 100.20,
                'status' => 0,
              ],
              [
                'id'   => 6, 
                'soilmoisture'  => 10000.20,
                'status' => 0,
              ],
              [
                'id'   => 7, 
                'soilmoisture'  => 9000.20,
                'status' => 0,
              ],
              [
                'id'   => 8, 
                'soilmoisture'  => 10000.20,
                'status' => 0,
              ],
              [
                'id'   => 9, 
                'soilmoisture'  => 1000.20,
                'status' => 0,
              ],
              [
                'id'   => 10, 
                'soilmoisture'  => 1300.20,
                'status' => 1,
              ],
            ]
            );
    }
}

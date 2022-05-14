<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sensorsconfiguration extends Model
{
    protected $fillable = [
        'id','sensor_name','sensor_limit_value','sensor_max_value','isOn',
    ];
}
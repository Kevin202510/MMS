<?php

namespace App\Http\Controllers;

use App\Models\Sensorsconfiguration;
use Illuminate\Http\Request;

class SensorsconfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sensorsconfiguration=Sensorsconfiguration::whereNull('deleted_at')->get();
        return response()->json($sensorsconfiguration);
    }

    public function index1()
    {
        $sensorsconfiguration=Sensorsconfiguration::where('isActive','1')->get();
        return response()->json($sensorsconfiguration);
    }

    public function index2()
    {
        $sensorsconfiguration=Sensorsconfiguration::where('deleted_at','!=',NULL)->get();
        return response()->json($sensorsconfiguration);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $input = $request->all();
        $sensorsconfiguration=Sensorsconfiguration::create($input); 
        return response()->json($sensorsconfiguration);
    }

    public function save2(Request $request)
    {
        $input = $request->all();
        $sensorsconfiguration=Sensorsconfiguration::create($input); 
        return response()->json($sensorsconfiguration);
    }
    
    public function save3(Request $request)
    {
        $input = $request->all();
        $sensorsconfiguration=Sensorsconfiguration::create($input); 
        return response()->json($sensorsconfiguration);
    }

    public function save4(Request $request)
    {
        $input = $request->all();
        $sensorsconfiguration=Sensorsconfiguration::create($input); 
        return response()->json($sensorsconfiguration);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sensorsconfiguration  $sensorsconfiguration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sensorsconfiguration $sensorsconfiguration)
    {
        $sensorsconfigurations = [
            "configuration_name" => $request->configuration_name,
            "configuration_value" => [
                "temperatureSensorMinVal" => $request->temperatureSensorMinVal,
                "temperatureSensorMaxVal" =>$request->temperatureSensorMaxVal,
                "temperaturestatusval" =>$request->temperaturestatusval,
                "humiditylimitval" =>$request->humiditylimitval,
                "humiditymaxval" =>$request->humiditymaxval,
                "humiditystatusval" =>$request->humiditystatusval,
                "lightlimitval" =>$request->lightlimitval,
                "lightmaxval" =>$request->lightmaxval,
                "lightstatusval" =>$request->lightstatusval,
                "co2limitval" =>$request->co2limitval,
                "co2maxval" =>$request->co2maxval,
                "co2statusval" =>$request->co2statusval
            ],
            "isActive" =>$request->isActive,
        ];
        $sensorsconfiguration->update($sensorsconfigurations);
        return response()->json($sensorsconfiguration, 200);
    }
}

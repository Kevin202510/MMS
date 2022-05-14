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
        $sensorsconfiguration=Sensorsconfiguration::where('id','1')->get();
        return response()->json($sensorsconfiguration);
    }

    public function index2()
    {
        $sensorsconfiguration=Sensorsconfiguration::where('id','2')->get();
        return response()->json($sensorsconfiguration);
    }

    public function index3()
    {
        $sensorsconfiguration=Sensorsconfiguration::where('id','3')->get();
        return response()->json($sensorsconfiguration);
    }

    public function index4()
    {
        $sensorsconfiguration=Sensorsconfiguration::where('id','4')->get();
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
        $input = $request->all();
        $sensorsconfiguration->update($input);
        return response()->json($sensorsconfiguration, 200);
    }

    public function update2(Request $request, Sensorsconfiguration $sensorsconfiguration)
    {
        $input = $request->all();
        $sensorsconfiguration->update($input);
        return response()->json($sensorsconfiguration, 200);
    }

    public function update3(Request $request, Sensorsconfiguration $sensorsconfiguration)
    {
        $input = $request->all();
        $sensorsconfiguration->update($input);
        return response()->json($sensorsconfiguration, 200);
    }

    public function update4(Request $request, Sensorsconfiguration $sensorsconfiguration)
    {
        $input = $request->all();
        $sensorsconfiguration->update($input);
        return response()->json($sensorsconfiguration, 200);
    }
}

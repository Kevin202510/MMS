<?php

namespace App\Http\Controllers;

use App\Models\Humidity;
use Illuminate\Http\Request;

class HumidityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $humidity=Humidity::whereNull('deleted_at')
                                ->orderBy('id', 'DESC')->get();
        return response()->json($humidity);
    }

    public function index2()
    {
        $humidity=Humidity::whereNull('deleted_at')
                                ->orderBy('id', 'DESC')->limit(10)->get();
        return response()->json($humidity);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Humidity  $humidity
     * @return \Illuminate\Http\Response
     */
    public function show(Humidity $humidity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Humidity  $humidity
     * @return \Illuminate\Http\Response
     */
    public function edit(Humidity $humidity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Humidity  $humidity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Humidity $humidity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Humidity  $humidity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Humidity $humidity)
    {
        //
    }
}

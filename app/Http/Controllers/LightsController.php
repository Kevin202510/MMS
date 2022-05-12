<?php

namespace App\Http\Controllers;

use App\Models\Lights;
use Illuminate\Http\Request;

class LightsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lights=Lights::whereNull('deleted_at')
                                ->orderBy('id', 'DESC')->get();
        return response()->json($lights);
    }

    public function index2()
    {
        $lights=Lights::whereNull('deleted_at')
                                ->orderBy('id', 'DESC')->limit(10)->get();
        return response()->json($lights);
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
     * @param  \App\Models\Lights  $lights
     * @return \Illuminate\Http\Response
     */
    public function show(Lights $lights)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lights  $lights
     * @return \Illuminate\Http\Response
     */
    public function edit(Lights $lights)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lights  $lights
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lights $lights)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lights  $lights
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lights $lights)
    {
        //
    }
}

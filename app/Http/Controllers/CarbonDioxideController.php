<?php

namespace App\Http\Controllers;

use App\Models\Carbondioxide;
use Illuminate\Http\Request;

class CarbonDioxideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carbondioxide=Carbondioxide::whereNull('deleted_at')
                                ->orderBy('id', 'DESC')->get();
        return response()->json($carbondioxide);
    }

    public function index2()
    {
        $carbondioxide=Carbondioxide::whereNull('deleted_at')
                                ->orderBy('id', 'DESC')->limit(10)->get();
        return response()->json($carbondioxide);
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
     * @param  \App\Models\Carbondioxide  $carbondioxide
     * @return \Illuminate\Http\Response
     */
    public function show(Carbondioxide $carbondioxide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carbondioxide  $carbondioxide
     * @return \Illuminate\Http\Response
     */
    public function edit(Carbondioxide $carbondioxide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carbondioxide  $carbondioxide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carbondioxide $carbondioxide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carbondioxide  $carbondioxide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carbondioxide $carbondioxide)
    {
        //
    }
}

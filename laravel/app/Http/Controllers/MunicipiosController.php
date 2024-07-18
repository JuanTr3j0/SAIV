<?php

namespace App\Http\Controllers;

use App\Models\Municipios;
use App\Http\Requests\StoreMunicipiosRequest;
use App\Http\Requests\UpdateMunicipiosRequest;

class MunicipiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreMunicipiosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMunicipiosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Municipios  $municipios
     * @return \Illuminate\Http\Response
     */
    public function show(Municipios $municipios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Municipios  $municipios
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipios $municipios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMunicipiosRequest  $request
     * @param  \App\Models\Municipios  $municipios
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMunicipiosRequest $request, Municipios $municipios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Municipios  $municipios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Municipios $municipios)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOficinasRequest;
use App\Http\Requests\UpdateOficinasRequest;
use App\Models\Oficinas;

class OficinasController extends Controller
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
     * @param  \App\Http\Requests\StoreOficinasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOficinasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Oficinas  $oficinas
     * @return \Illuminate\Http\Response
     */
    public function show(Oficinas $oficinas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Oficinas  $oficinas
     * @return \Illuminate\Http\Response
     */
    public function edit(Oficinas $oficinas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOficinasRequest  $request
     * @param  \App\Models\Oficinas  $oficinas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOficinasRequest $request, Oficinas $oficinas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Oficinas  $oficinas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Oficinas $oficinas)
    {
        //
    }
}

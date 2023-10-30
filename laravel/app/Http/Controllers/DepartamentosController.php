<?php

namespace App\Http\Controllers;

use App\Models\Departamentos;
use App\Http\Requests\StoreDepartamentosRequest;
use App\Http\Requests\UpdateDepartamentosRequest;

class DepartamentosController extends Controller
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
     * @param  \App\Http\Requests\StoreDepartamentosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartamentosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departamentos  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function show(Departamentos $departamentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departamentos  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function edit(Departamentos $departamentos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDepartamentosRequest  $request
     * @param  \App\Models\Departamentos  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartamentosRequest $request, Departamentos $departamentos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departamentos  $departamentos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamentos $departamentos)
    {
        //
    }
}

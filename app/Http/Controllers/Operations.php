<?php

namespace App\Http\Controllers;

use App\Operation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class Operations extends Controller
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
     * @param  \Illuminate\Http\Request $request
     * @return RedirectResponse
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function store(Request $request): RedirectResponse
    {
        $operation = new Operation();
        $operation->fill($request->all());
        $operation->save();

        return redirect(route('operations.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function show(Operation $operation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function edit(Operation $operation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Operation $operation
     * @return RedirectResponse
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function update(Request $request): RedirectResponse
    {
        $operation = Operation::find($request->operation);
        $operation->fill($request->all());
        $operation->save();

        return redirect(route('operations.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Operation  $operation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operation $operation)
    {
        //
    }
}

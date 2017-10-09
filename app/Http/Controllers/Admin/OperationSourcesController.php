<?php

namespace App\Http\Controllers\Admin;

use App\OperationItem;
use Cowsayphp\Cow;
use Cowsayphp\Farm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OperationSourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cow = Farm::create(Cow::class);
        return '<pre>'. $cow->say('Coming soon...') .'</pre>';
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
     * @param  \App\OperationItem  $operationItem
     * @return \Illuminate\Http\Response
     */
    public function show(OperationItem $operationItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OperationItem  $operationItem
     * @return \Illuminate\Http\Response
     */
    public function edit(OperationItem $operationItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OperationItem  $operationItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OperationItem $operationItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OperationItem  $operationItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(OperationItem $operationItem)
    {
        //
    }
}

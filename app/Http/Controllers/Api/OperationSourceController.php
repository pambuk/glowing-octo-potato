<?php

namespace App\Http\Controllers\Api;

use App\OperationSource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OperationSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \App\Http\Resources\OperationSource::collection(OperationSource::all());
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  OperationSource $operationSource
     * @return \Illuminate\Http\Response
     */
    public function show(OperationSource $operationSource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  OperationSource $operationSource
     * @return \Illuminate\Http\Response
     */
    public function edit(OperationSource $operationSource)
    {
        return $operationSource;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  OperationSource $operationSource
     * @return OperationSource
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function update(Request $request, OperationSource $operationSource): OperationSource
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $operationSource->fill($request->all())->save();

        return $operationSource;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  OperationSource $operationSource
     * @return \Illuminate\Http\Response
     */
    public function destroy(OperationSource $operationSource)
    {
        return response()->json(['removed' => $operationSource->delete()]);
    }
}

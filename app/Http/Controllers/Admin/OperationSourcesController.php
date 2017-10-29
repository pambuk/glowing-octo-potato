<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\OperationItem;
use App\OperationSource;
use App\Services\OperationSourceService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class OperationSourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $sources = (new OperationSourceService())->get();
        return view('admin.operation-sources.index', ['sources' => $sources]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OperationItem  $operationItem
     * @return Response
     */
    public function show(OperationSource $operation_source)
    {
//        dd($operation_source);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param OperationSource $operationSource
     * @return Response
     */
    public function edit(OperationSource $operationSource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OperationItem  $operationItem
     * @return Response
     */
    public function update(Request $request, OperationItem $operationItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OperationItem  $operationItem
     */
    public function destroy(OperationSource $operationSource)
    {
        $operationSource->delete();

        return $operationSource;
    }
}

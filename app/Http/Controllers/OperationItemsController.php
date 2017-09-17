<?php

namespace App\Http\Controllers;

use App\Operation;
use App\OperationItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OperationItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Operation $operation
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Operation $operation)
    {
        return view('operation-items.index', compact('operation'));
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Operation $operation
     * @param OperationItem $item
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Operation $operation, OperationItem $item): RedirectResponse
    {
        /** @var OperationItem $item */
        if ($item->operation_id === $operation->id && $operation->user_id === \Auth::user()->id) {
            $item->delete();
        }

        return redirect()->back();
    }
}

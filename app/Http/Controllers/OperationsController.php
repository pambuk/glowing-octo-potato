<?php

namespace App\Http\Controllers;

use App\Services\OperationService;
use Carbon\Carbon;

class OperationsController extends Controller
{
    public function index()
    {
        $now = Carbon::now();

        $operations = (new OperationService())->byUser(\Auth::user())
            ->byMonth($now)
            ->get();

        return view('operations.index', [
            'operations' => $operations,
        ]);
    }
}

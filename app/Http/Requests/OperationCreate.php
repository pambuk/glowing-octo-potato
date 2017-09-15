<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OperationCreate extends FormRequest
{
    public function authorize(): bool
    {
        return \Auth::check();
    }

    public function rules(): array
    {
        return [
            'type' => 'required',
            'value' => 'required|numeric',
            'operation_source_id' => 'nullable|sometimes|exists:operation_sources,id',
        ];
    }
}

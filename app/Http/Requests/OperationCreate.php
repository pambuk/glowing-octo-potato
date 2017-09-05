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
            'amount' => 'required|numeric',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OperationItemCreate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'description' => 'required',
            'value' => 'required|numeric',
            'operation_id' => 'required|exists:operations,id',
        ];
    }
}

<?php

namespace App\Http\Requests\Connection;

use App\Http\Requests\Common\BaseRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class UpdateConnectionRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:200',
            ],
            'file' => [
                'nullable',
                'file',
                'extensions:json',
            ],
        ];
    }
}

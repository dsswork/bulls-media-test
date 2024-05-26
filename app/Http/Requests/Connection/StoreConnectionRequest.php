<?php

namespace App\Http\Requests\Connection;

use App\Http\Requests\Common\BaseRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class StoreConnectionRequest extends BaseRequest
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
                'required',
                'file',
                'extensions:json',
            ],
            'user_id' => [
                'int'
            ],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => auth()->id(),
        ]);
    }
}

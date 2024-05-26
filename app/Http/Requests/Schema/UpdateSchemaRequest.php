<?php

namespace App\Http\Requests\Schema;

use App\Http\Requests\Common\BaseRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class UpdateSchemaRequest extends BaseRequest
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
                'max:200'
            ],
            'fields' => [
                'array'
            ],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'fields' => array_values($this->fields)
        ]);
    }
}

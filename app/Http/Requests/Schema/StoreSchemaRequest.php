<?php

namespace App\Http\Requests\Schema;

use App\Http\Requests\Common\BaseRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class StoreSchemaRequest extends BaseRequest
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
            'user_id' => [
                'int'
            ],
            'fields' => [
                'array'
            ],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => auth()->id(),
            'fields' => array_values($this->fields)
        ]);
    }
}

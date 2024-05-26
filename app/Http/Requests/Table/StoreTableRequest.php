<?php

namespace App\Http\Requests\Table;

use App\Http\Requests\Common\BaseRequest;
use App\Models\Connection;
use Illuminate\Contracts\Validation\ValidationRule;

class StoreTableRequest extends BaseRequest
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
            'sheet' => [
                'required',
                'string',
                'max:200',
            ],
            'connection_id' => [
                'required',
                'int',
                'exists:' . Connection::class . ',id'
            ],
        ];
    }
}

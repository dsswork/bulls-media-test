<?php

namespace App\Http\Requests\DataTable;

use App\Http\Requests\Common\BaseRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class UpdateDataTableRequest extends BaseRequest
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

            ],
            'table_id' => [

            ],
            'schema_id' => [

            ],
        ];
    }
}

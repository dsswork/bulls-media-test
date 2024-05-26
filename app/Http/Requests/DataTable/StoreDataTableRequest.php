<?php

namespace App\Http\Requests\DataTable;

use App\Http\Requests\Common\BaseRequest;
use App\Models\Schema;
use App\Models\Table;
use Illuminate\Contracts\Validation\ValidationRule;

class StoreDataTableRequest extends BaseRequest
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
            'table_id' => [
                'int',
                'exists:' . Table::class . ',id'
            ],
            'schema_id' => [
                'int',
                'exists:' . Schema::class . ',id'
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

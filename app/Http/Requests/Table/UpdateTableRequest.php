<?php

namespace App\Http\Requests\Table;

use App\Http\Requests\Common\BaseRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class UpdateTableRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}

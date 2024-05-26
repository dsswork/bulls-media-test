<?php

namespace App\Http\Services;

use App\Models\DataTable;

class DataTableService extends BaseService
{
    public function __construct(
        DataTable $dataTable
    ) {
        $this->model = $dataTable;
    }
}

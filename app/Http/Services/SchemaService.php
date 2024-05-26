<?php

namespace App\Http\Services;

use App\Models\Schema;

class SchemaService extends BaseService
{
    public function __construct(
        Schema $schema
    ) {
        $this->model = $schema;
    }
}

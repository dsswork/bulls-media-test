<?php

namespace App\Http\Services;

use App\Models\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class SchemaService extends BaseService
{
    public function __construct(
        Schema $schema
    ) {
        $this->model = $schema;
    }

    public function create(array $params, UploadedFile|null $file = null): Model|Builder
    {
        return $this->model
            ->query()
            ->create($params);
    }
}

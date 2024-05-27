<?php

namespace App\Http\Services;

use App\Models\Table;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class TableService extends BaseService
{
    public function __construct(
        Table $table
    ) {
        $this->model = $table;
    }

    public function getAllByUser(User $user): Collection|array
    {
        return Table::query()->whereHas('connection', function ($query) {
            $query->where('user_id', auth()->id());
        })->get();
    }

    public function create(array $params): Model|Builder
    {
        return $this->model
            ->query()
            ->create($params);
    }
}

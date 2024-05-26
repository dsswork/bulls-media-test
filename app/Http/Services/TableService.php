<?php

namespace App\Http\Services;

use App\Models\Table;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

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
}

<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class BaseService
{
    protected $model;

    public function getAllByUser(User $user): Collection|array
    {
        return $this->model->query()
            ->where('user_id', $user->getKey())
            ->get();
    }

    public function delete(Model $model): void
    {
        $model->delete();
    }
}

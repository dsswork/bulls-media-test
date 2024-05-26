<?php

namespace App\Http\Services;

use App\Models\Connection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ConnectionService extends BaseService
{
    public function __construct(
        Connection $connection
    ) {
        $this->model = $connection;
    }

    public function create(array $params, UploadedFile|null $file): Model|Builder|Connection
    {
        if ($file) {
            $filename = $file->getClientOriginalName();
            Storage::putFileAs(auth()->id(), $file, $filename);
            $params['file'] = 'connections/' . auth()->id() . '/' . $filename;
        }

        return Connection::query()->create($params);
    }

    public function update(Connection $connection, array $params, UploadedFile|null $file): void
    {
        if ($file) {
            $filename = $file->getClientOriginalName();
            Storage::putFileAs(auth()->id(), $file, $filename);
            $params['file'] = 'connections/' . auth()->id() . '/' . $filename;
        } else {
            unset($params['file']);
        }

        $connection->update($params);
    }
}

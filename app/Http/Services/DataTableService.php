<?php

namespace App\Http\Services;

use App\Models\Column;
use App\Models\DataTable;
use App\Models\Schema;
use App\Models\Table;
use App\Models\Value;
use Illuminate\Support\Facades\DB;
use Revolution\Google\Sheets\Facades\Sheets;

class DataTableService extends BaseService
{
    public function __construct(
        DataTable $dataTable
    )
    {
        $this->model = $dataTable;
    }

    public function create(array $params): void
    {
        $dataTable = DataTable::query()
            ->create(
                [
                    'name' => $params['name'],
                    'user_id' => $params['user_id']
                ]
            );

        $schema = Schema::query()->find($params['schema_id']);

        $columns = [];
        DB::transaction(function ()  use ($schema, $dataTable, &$columns) {
            foreach ($schema->fields as $field) {
                $column = Column::query()->create(
                    [
                        'name' => $field['value'],
                        'data_table_id' => $dataTable->getKey()
                    ]
                );
                $columns[$field['key']] = $column;
            }
        });

        /* @var Table $table */
        $table = Table::query()
            ->where('id', $params['table_id'])
            ->with('connection')
            ->first();

        config()->set('google.service.file', storage_path($table->connection->file));

        $values = Sheets::spreadsheetByTitle($table->name)
            ->sheet($table->sheet)
            ->get();

        $header = $values->pull(0);
        $values = Sheets::collection(header: $header, rows: $values);
        $values = array_values($values->toArray());

        $insertValues = [];
        $j = 0;
        foreach ($values as $value) {
            $i = 0;
            foreach ($value as $columnKey => $columnValue) {
                if ($columns[$columnKey] ?? false) {
                    $insertValues[$j]['value'] = $columnValue;
                    $insertValues[$j]['column_id'] = $columns[$columnKey]->getKey();
                    $insertValues[$j]['sort'] = $i;
                    $i++;
                    $j++;
                }
            }
        }

        Value::query()->insert($insertValues);
    }
}

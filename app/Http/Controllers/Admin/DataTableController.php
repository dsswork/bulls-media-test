<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataTable\StoreDataTableRequest;
use App\Http\Requests\DataTable\UpdateDataTableRequest;
use App\Http\Services\DataTableService;
use App\Http\Services\SchemaService;
use App\Http\Services\TableService;
use App\Models\Column;
use App\Models\DataTable;
use App\Models\Schema;
use App\Models\Table;
use App\Models\Value;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Revolution\Google\Sheets\Facades\Sheets;

class DataTableController extends Controller
{
    public function __construct(
        readonly private DataTableService $service,
        readonly private SchemaService $schemaService,
        readonly private TableService $tableService,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $dataTables = $this->service->getAllByUser(
            $this->getUser()
        );

        return view('admin.dataTables.index', ['models' => $dataTables]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $schemas = $this->schemaService->getAllByUser($this->getUser());
        $tables = $this->tableService->getAllByUser($this->getUser());

        return view(
            'admin.dataTables.create',
            compact(['schemas', 'tables'])
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDataTableRequest $request)
    {
        $dataTable = DataTable::query()
            ->create(
                [
                    'name' => $request->name,
                    'user_id' => $request->user_id
                ]
            );

        $schema = Schema::query()->find($request->schema_id);

        $columns = [];
        foreach($schema->fields as $field) {
            $column = Column::query()->create(
                [
                    'name' => $field['value'],
                    'data_table_id' => $dataTable->getKey()
                ]
            );
            $columns[$field['key']] = $column;
        }

        /* @var Table $table */
        $table = Table::query()
            ->where('id', $request->table_id)
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
        $j=0;
        foreach ($values as $value) {
            $i = 0;
            foreach($value as $columnKey => $columnValue) {
                if($columns[$columnKey] ?? false) {
                    $insertValues[$j]['value'] = $columnValue;
                    $insertValues[$j]['column_id'] = $columns[$columnKey]->getKey();
                    $insertValues[$j]['sort'] = $i;
                    $i++;
                    $j++;
                }
            }
        }

        Value::query()->insert($insertValues);

        return to_route('admin.dataTables.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataTable $dataTable): View
    {
       $dataTable->load('columns.values');

        return view('admin.dataTables.edit', compact('dataTable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDataTableRequest $request, DataTable $dataTable): RedirectResponse
    {
        return to_route('admin.dataTables.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataTable $dataTable): RedirectResponse
    {
        $this->service->delete($dataTable);

        return to_route('admin.dataTables.index');
    }
}

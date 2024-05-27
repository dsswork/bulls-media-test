<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataTable\StoreDataTableRequest;
use App\Http\Requests\DataTable\UpdateDataTableRequest;
use App\Http\Services\DataTableService;
use App\Http\Services\SchemaService;
use App\Http\Services\TableService;
use App\Models\DataTable;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DataTableController extends Controller
{
    public function __construct(
        readonly private DataTableService $service,
        readonly private SchemaService    $schemaService,
        readonly private TableService     $tableService,
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $dataTables = $this->service->getAllByUser($this->getUser());

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
    public function store(StoreDataTableRequest $request): RedirectResponse
    {
        $this->service->create($request->validated());

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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Table\StoreTableRequest;
use App\Http\Requests\Table\UpdateTableRequest;
use App\Http\Services\ConnectionService;
use App\Http\Services\TableService;
use App\Models\Connection;
use App\Models\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Revolution\Google\Sheets\Facades\Sheets;

class TableController extends Controller
{
    public function __construct(
        readonly private TableService $service,
        readonly private ConnectionService $connectionService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tables = $this->service->getAllByUser($this->getUser());
        return view('admin.tables.index', ['models' => $tables]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $connections = $this->connectionService->getAllByUser($this->getUser());

        return view('admin.tables.create', compact('connections'));
    }

    public function createSecondStep(Request $request): View
    {
        /* @var Connection $connection */
        $connection = Connection::query()
            ->with('tables')
            ->where('id', $request->connection_id)
            ->first();

        config()->set('google.service.file', storage_path($connection->file));
        $tables = Sheets::spreadsheetList();

        return view('admin.tables.create-second', compact('tables', 'connection'));
    }

    public function createThirdStep(Request $request): View
    {
        $name = $request->name;
        /* @var Connection $connection */
        $connection = Connection::query()
            ->with('tables')
            ->where('id', $request->connection_id)
            ->first();

        config()->set('google.service.file', storage_path($connection->file));
        $sheets = Sheets::spreadsheetByTitle($name)->sheetList();

        return view('admin.tables.create-third', compact('sheets', 'connection', 'name'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTableRequest $request): RedirectResponse
    {
        Table::query()->create($request->validated());
        return to_route('admin.tables.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table): View
    {
        return view('admin.tables.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTableRequest $request, Table $table): RedirectResponse
    {
        return to_route('admin.tables.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table): RedirectResponse
    {
        $table->delete();
        return to_route('admin.tables.index');
    }
}

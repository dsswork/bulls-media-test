<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Schema\StoreSchemaRequest;
use App\Http\Requests\Schema\UpdateSchemaRequest;
use App\Http\Services\SchemaService;
use App\Models\Schema;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SchemaController extends Controller
{
    public function __construct(
        readonly private SchemaService $service
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $schemas = $this->service->getAllByUser($this->getUser());

        return view('admin.schemas.index', ['models' => $schemas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.schemas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSchemaRequest $request): RedirectResponse
    {
        $this->service->create($request->validated());

        return to_route('admin.schemas.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schema $schema): View
    {
        return view('admin.schemas.edit', compact('schema'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSchemaRequest $request, Schema $schema): RedirectResponse
    {
        $schema->update($request->validated());
        return to_route('admin.schemas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schema $schema): RedirectResponse
    {
        $schema->delete();
        return to_route('admin.schemas.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Connection\StoreConnectionRequest;
use App\Http\Requests\Connection\UpdateConnectionRequest;
use App\Http\Services\ConnectionService;
use App\Models\Connection;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ConnectionController extends Controller
{
    public function __construct(
        readonly private ConnectionService $service
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $connections = $this->service->getAllByUser($this->getUser());

        return view('admin.connections.index', ['models' => $connections]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.connections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConnectionRequest $request): RedirectResponse
    {
        $this->service->create(
            $request->validated(),
            $request->file('file')
        );

        return to_route('admin.connections.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Connection $connection): View
    {
        return view(
            'admin.connections.edit',
            compact('connection')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConnectionRequest $request, Connection $connection): RedirectResponse
    {
        $this->service->update(
            $connection,
            $request->validated(),
            $request->file('file')
        );

        return to_route('admin.connections.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Connection $connection): RedirectResponse
    {
        $this->service->delete($connection);

        return to_route('admin.connections.index');
    }
}

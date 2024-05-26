<x-admin.layout title="Edit Data Table">
    <form action="{{ route('admin.dataTables.update', compact('dataTable')) }}"
          method="post"
          >
        @csrf
        @method('put')
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Edit Data Table</h3>
            </div>
            <div class="card-body">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                @foreach($dataTable->columns ?? [] as $column)
                                <th>{{ $column->name }}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dataTable->columns->first()->values as $value)
                            <tr>
                                @foreach($dataTable->columns ?? [] as $column)
                                <td>{{ $column->values[$loop->parent->index]->value }}</td>
                                @endforeach
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
       <x-admin.buttons.save-delete />
    </form>
</x-admin.layout>

<x-admin.modals.delete :model="$dataTable" />

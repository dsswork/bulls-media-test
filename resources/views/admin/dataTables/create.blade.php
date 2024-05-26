<x-admin.layout title="Create Data Table">
    <form action="{{ route('admin.dataTables.store') }}"
          method="post"
          enctype="multipart/form-data"
          class="col-md-6">
        @csrf
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Create Data Table</h3>
            </div>
            <div class="card-body">
                <x-admin.fields.input label="Name" id="dataTableName"/>
                <div class="form-group">
                    <label for="table">Tables</label>
                    <select class="form-control" name="table_id" id="table">
                        @foreach($tables as $table)
                            <option value="{{ $table->id }}">{{ $table->name }} - {{ $table->sheet }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="schema">Schemas</label>
                    <select class="form-control" name="schema_id" id="schema">
                        @foreach($schemas as $schema)
                            <option value="{{ $schema->id }}">{{ $schema->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div style="width: 100px;">
            <button type="submit" class="btn btn-block btn-dark">Save</button>
        </div>
    </form>
</x-admin.layout>

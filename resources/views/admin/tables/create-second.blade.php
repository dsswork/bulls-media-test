<x-admin.layout title="Create Table">
    <form action="{{ route('admin.tables.createThirdStep') }}"
          method="get"
          enctype="multipart/form-data"
          class="col-md-6">
        @csrf
        <input type="hidden" name="connection_id" value="{{ $connection->id }}">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Create Table - Select Table</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="connection">Table</label>
                    <select class="form-control" name="name" id="connection">
                        @foreach($tables as $table)
                            <option value="{{ $table }}">{{ $table }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div style="width: 100px;">
            <button type="submit" class="btn btn-block btn-dark">Next</button>
        </div>
    </form>
</x-admin.layout>

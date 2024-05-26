<x-admin.layout title="Create Table">
    <form action="{{ route('admin.tables.createSecondStep') }}"
          method="get"
          enctype="multipart/form-data"
          class="col-md-6">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Create Table - Select Connection</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="connection">Connection</label>
                    <select class="form-control" name="connection_id" id="connection">
                        @foreach($connections as $connection)
                            <option value="{{ $connection->id }}">{{ $connection->name }}</option>
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

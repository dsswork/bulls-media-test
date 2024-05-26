<x-admin.layout title="Create Table">
    <form action="{{ route('admin.tables.store') }}"
          method="post"
          enctype="multipart/form-data"
          class="col-md-6">
        @csrf
        <input type="hidden" name="connection_id" value="{{ $connection->id }}">
        <input type="hidden" name="name" value="{{ $name }}">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Create Table - Select Sheet</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="connection">Sheet</label>
                    <select class="form-control" name="sheet" id="connection">
                        @foreach($sheets as $sheeet)
                            <option value="{{ $sheeet }}">{{ $sheeet }}</option>
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

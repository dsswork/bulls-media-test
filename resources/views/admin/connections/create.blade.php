<x-admin.layout title="Create Connection">
    <form action="{{ route('admin.connections.store') }}"
          method="post"
          enctype="multipart/form-data"
          class="col-md-6">
        @csrf
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Create Connection</h3>
            </div>
            <div class="card-body">
                <x-admin.fields.input label="Name" id="connectionName"/>
                <x-admin.fields.file label="File" id="connectionFile"/>
            </div>
        </div>
        <div style="width: 100px;">
            <button type="submit" class="btn btn-block btn-dark">Save</button>
        </div>
    </form>
</x-admin.layout>

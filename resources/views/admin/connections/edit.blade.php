<x-admin.layout title="Edit Connection">
    <form action="{{ route('admin.connections.update', compact('connection')) }}"
          method="post"
          enctype="multipart/form-data"
          class="col-md-6">
        @csrf
        @method('put')
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Edit Connection</h3>
            </div>
            <div class="card-body">
                <x-admin.fields.input label="Name" id="connectionName" :value="$connection->name"/>
                <x-admin.fields.file label="File" id="connectionFile" :value="$connection->file"/>
            </div>
        </div>
       <x-admin.buttons.save-delete />
    </form>
</x-admin.layout>

<x-admin.modals.delete :model="$connection" />

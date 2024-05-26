<x-admin.layout title="Edit Table">
    <form action="{{ route('admin.tables.update', compact('table')) }}"
          method="post"
          enctype="multipart/form-data"
          class="col-md-6">
        @csrf
        @method('put')
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Edit Table</h3>
            </div>
            <div class="card-body">
                <label for="">{{ $table->name }}</label>
            </div>
        </div>
       <x-admin.buttons.save-delete />
    </form>
</x-admin.layout>

<x-admin.modals.delete :model="$table" />

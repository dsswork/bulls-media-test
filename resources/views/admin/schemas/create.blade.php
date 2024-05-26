<x-admin.layout title="Create Schema">
    <form action="{{ route('admin.schemas.store') }}"
          method="post"
          enctype="multipart/form-data"
          class="col-md-6">
        @csrf
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Create Schema</h3>
            </div>
            <div class="card-body">
                <x-admin.fields.input label="Name" id="connectionName"/>
            </div>
        </div>
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Fields</h3>
            </div>
            <div class="card-body">
                <div id="wrapper">
                </div>
                <div style="width: 150px">
                    <button type="button" onclick="addField()"
                            class="btn btn-block btn-dark">Add Field
                    </button>
                </div>
            </div>
        </div>
        <div style="width: 100px;">
            <button type="submit" class="btn btn-block btn-dark">Save</button>
        </div>
    </form>
</x-admin.layout>

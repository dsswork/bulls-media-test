<x-admin.layout title="Edit Schema">
    <form action="{{ route('admin.schemas.update', compact('schema')) }}"
          method="post"
          enctype="multipart/form-data"
          class="col-md-6">
        @csrf
        @method('put')
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Edit Schema</h3>
            </div>
            <div class="card-body">
                <x-admin.fields.input label="Name" id="connectionName" :value="$schema->name"/>
            </div>
        </div>
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Fields</h3>
            </div>
            <div class="card-body">
                <div id="wrapper">
                    @foreach($schema->fields ?? [] as $field)
                        <div class="d-flex my-1" id="field{{ $loop->index }}">
                            <div class="d-flex">
                                <input type="text"
                                       name="fields[{{ $loop->index }}][key]"
                                       value="{{ $field['key'] }}"
                                       class="form-control" placeholder="KEY">
                                <input type="text"
                                       name="fields[{{ $loop->index }}][value]"
                                       value="{{ $field['value'] }}"
                                       class="form-control mx-4" placeholder="VALUE">
                            </div>

                            <div style="width: 50px">
                                <button type="button"
                                        class="btn btn-block btn-dark"
                                        onclick="removeField('field{{ $loop->index }}')"
                                >
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div style="width: 150px">
                    <button type="button" onclick="addField()"
                            class="btn btn-block btn-dark">Add Field
                    </button>
                </div>
            </div>
        </div>
       <x-admin.buttons.save-delete />
    </form>
</x-admin.layout>

<x-admin.modals.delete :model="$schema" />

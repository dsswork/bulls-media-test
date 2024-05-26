<x-admin.layout title="Connections">
    <a href="{{ route('admin.connections.create') }}" class="btn btn-dark">Create</a>
    <x-admin.table
        :collection="$models"
        :names="['id', 'name', 'file']"
        edit
    />
</x-admin.layout>

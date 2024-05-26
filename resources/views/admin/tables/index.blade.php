<x-admin.layout title="Tables">
    <a href="{{ route('admin.tables.create') }}" class="btn btn-dark">Create</a>
    <x-admin.table
        :collection="$models"
        :names="['id', 'name', 'sheet']"
        edit
    />
</x-admin.layout>

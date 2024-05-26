<x-admin.layout title="Data Tables">
    <a href="{{ route('admin.dataTables.create') }}" class="btn btn-dark">Create</a>
    <x-admin.table
        :collection="$models"
        :names="['id', 'name', 'created_at']"
        edit
    />
</x-admin.layout>

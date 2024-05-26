<x-admin.layout title="Schemas">
    <a href="{{ route('admin.schemas.create') }}" class="btn btn-dark">Create</a>
    <x-admin.table
        :collection="$models"
        :names="['id', 'name']"
        edit
    />
</x-admin.layout>

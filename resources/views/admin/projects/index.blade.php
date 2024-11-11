@extends('layouts.app')

<!-- Index -->
@section('main')
    <div class="container-fluid">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3">Create</a>
        <!-- Table -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Functions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects_list as $project)
                    <tr class="align-middle">
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->type->name }}</td>
                        <td>{{ substr($project->description, 0, 125) . '...' }}</td>
                        <td>
                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-success">Show</a>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.projects.delete', $project) }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <div>Not Available</div>
                @endforelse
            </tbody>
        </table>
        <div>{{ $projects_list->links() }}</div>
    </div>
@endsection

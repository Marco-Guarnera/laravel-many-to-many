@extends('layouts.app')

<!-- Show -->
@section('main')
    <div class="container-fluid">
        <!-- Table -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->type->name }}</td>
                    <td>{{ $project->description }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

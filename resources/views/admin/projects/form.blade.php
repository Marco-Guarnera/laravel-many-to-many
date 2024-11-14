@extends('layouts.app')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <!-- Errors -->
                @include('partials.errors')
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <!-- Form -->
                <form action="@yield('form-action')" method="post" enctype="multipart/form-data">
                    @yield('form-method')
                    @csrf
                    <!-- Project Name -->
                    <label for="project-name" class="form-label">Name:</label>
                    <input type="text" id="project-name" class="form-control" name="name" value="{{ old('name', $project->name) }}" placeholder="Name">
                    {{-- @error('name')
                        @include('partials.error')
                    @enderror --}}
                    <!-- Project Type -->
                    <label for="project-type" class="form-label">Type:</label>
                    <select id="project-type" class="form-select" name="type_id">
                        @foreach ($types_list as $item)
                            <option value="{{ $item->id }}" @if ($item->id == old('type_id', $project->type_id)) selected @endif>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <!-- Project Description -->
                    <label for="project-description" class="form-label">Description:</label>
                    <textarea id="project-description" class="form-control" name="description" rows="5" placeholder="Description">{{ old('description', $project->description) }}</textarea>
                    <!-- Project Img -->
                    <label for="project-img" class="form-label">Image:</label>
                    <input type="file" id="project-img" class="form-control" name="img">
                    <div class="my-3">
                        <button type="submit" class="btn btn-primary">@yield('form-submit')</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

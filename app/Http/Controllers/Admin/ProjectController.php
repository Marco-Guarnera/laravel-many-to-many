<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller {
    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']);
    }

    // Create
    public function create() {
        $project = new Project();
        $types_list = Type::all();
        return view('admin.projects.create', compact('project', 'types_list'));
    }

    // Store
    public function store(StoreProjectRequest $request) {
        $data_list = $request->validated();

        if ($request->hasFile('img')) {
            $file_path = Storage::disk('public')->put('/img/projects/', $request->img);
            $data_list['img'] = $file_path;
        }

        $project = Project::create($data_list);

        return redirect()->route('admin.projects.index')
            ->with('status', 'Created!')
            ->with('alert-class', 'success');
    }

    // Index
    public function index() {
        $projects_list = Project::paginate(5);
        return view('admin.projects.index', compact('projects_list'));
    }

    // Show
    public function show(Project $project) {
        return view('admin.projects.show', compact('project'));
    }

    // Edit
    public function edit(Project $project) {
        $types_list = Type::all();
        return view('admin.projects.edit', compact('project', 'types_list'));
    }

    // Update
    public function update(UpdateProjectRequest $request, Project $project) {
        $data_list = $request->validated();

        if ($request->hasFile('img')) {
            if ($project->img) Storage::disk('public')->delete($project->img);
            $file_path = Storage::disk('public')->put('/img/projects/', $request->img);
            $data_list['img'] = $file_path;
        }

        $project->update($data_list);

        return redirect()->route('admin.projects.index')
            ->with('status', 'Updated!')
            ->with('alert-class', 'primary');
    }

    // Delete
    public function destroy(Project $project) {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}

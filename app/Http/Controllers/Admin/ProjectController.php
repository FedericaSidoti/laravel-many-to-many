<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Validation\Rule;
use App\Models\Type;

class ProjectController extends Controller
{
    public function index()
    {

        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'title' => 'required|max:255|',
            'thumb' => 'required|url',
            'description' => 'required',
            'type_id' => 'nullable|exists:types,id',
            'technology_id' => 'nullable|exists:technologies,id'
        ]);

        $newProject = Project::create($data);

        if($request->has('techs')) {
            $newProject->technologies()->attach($data['techs']);
        };

        return redirect()->route('admin.projects.index', $newProject);
    }

    public function edit(Project $project)

    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->all();

        $request->validate([
            'title' => 'required|max:255|',
            'thumb' => 'required|url',
            'description' => 'required',
            'type_id' => 'nullable|exists:types,id',
            'technology_id' => 'nullable|exists:technologies,id'
        ]);

        $project->update($data);

        if($request->has('techs')) {
            $project->technologies()->sync($data['techs']);
        } else {
            $project->technologies()->detach();
        }

        return redirect()->route('admin.projects.show', $project->id);
    }

    public function destroy(Project $project)
    {

        $project->delete();

        $project->technologies()->sync([]);

        return redirect()->route('admin.projects.index');
    }
}

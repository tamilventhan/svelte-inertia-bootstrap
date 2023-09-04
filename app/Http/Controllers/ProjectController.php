<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $projects = Project::query()->where('name', 'LIKE', '%' . $search . '%')
            ->orwhere('language', 'LIKE', '%' . $search . '%')
            ->orwhere('assigned_person', 'LIKE', '%' . $search . '%')
            ->paginate(10);

        return Inertia::render('projects/index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        $validated = $request->validated();

        $project = Project::create($validated);

        // $project= new Project;
        // $project->name=$request->name;
        // $project->language=$request->language;
        // $project->assigned_person=$request->assigned_person;
        // $project->start_date=$request->start_date;
        // $project->end_date=$request->end_date;
        // $project->save();

<<<<<<< HEAD
        return to_route('projects.index')
            ->with('success', 'project saved succesfully')
            ->with('type', 'PROJECT_ADDED');
=======
        return to_route('projects.index')->with('success','Project saved succesfully');
>>>>>>> f8a910c830b9cd1c1891b979c739f5fa5ba4c933
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validated = $request->validated();
        $project->update($validated);

<<<<<<< HEAD
        return to_route('projects.index')->with('success', ' project updated succesfully');
=======
        return to_route('projects.index')->with('success','Project updated succesfully');
>>>>>>> f8a910c830b9cd1c1891b979c739f5fa5ba4c933
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
<<<<<<< HEAD
        return to_route('projects.index')->with('success', ' project deleted succesfully');
=======
        return to_route('projects.index')->with('success','Project deleted succesfully');
>>>>>>> f8a910c830b9cd1c1891b979c739f5fa5ba4c933
    }
}

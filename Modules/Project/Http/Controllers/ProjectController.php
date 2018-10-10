<?php

namespace Modules\Project\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Project\Entities\Project;
use Modules\Admin\Entities\Price;
use Modules\Project\Http\Library\Services\ProjectService;
use Modules\Project\Http\Requests\CreateProject;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  Project $project
     * @return Response
     */
    public function index(Project $project)
    {
        $projects = $project->latest()->simplePaginate(5);

        return view('project::index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     * @param  Project $project
     * @param Price $price
     * @param ProjectService $service
     * @return Response
     */
    public function create(Price $price, Project $project, ProjectService $service)
    {
        print $service->checkBalance($project, $price);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Project $project
     * @param Price $price
     * @param  CreateProject $request
     * @param ProjectService $service
     * @return Response
     */
    public function store(Price $price, Project $project, CreateProject $request, ProjectService $service)
    {
        print $service->addProject($price, $project, $request);

        return redirect()->route('project.show', $project);
    }

    /**
     * Show the specified resource.
     * @param Project $project
     * @return Response
     */
    public function show(Project $project)
    {
        $group = $project->task->groupBy('status');

        return view('project::show', compact('group', 'project'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Project $project
     * @return Response
     */
    public function edit(Project $project)
    {
        return view('project::edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     * @param Project $project
     * @param  CreateProject $request
     * @return Response
     */
    public function update(Project $project, CreateProject $request)
    {
        $project->update(['title' => $request->title]);

        return redirect()->route('project.show', $project);
    }

    /**
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('project.index');

    }
}

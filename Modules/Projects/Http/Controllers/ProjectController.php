<?php

namespace Modules\Projects\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Projects\Model\Project;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  Project $project
     * @return Response
     */
    public function index(Project $project)
    {
        $projects = $project->asc()->simplePaginate(5);

        return view('projects::index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('projects::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Project $project
     * @param  Request $request
     * @return Response
     */
    public function store(Project $project, Request $request)
    {
        $project->create(['title' => $request->title]);

        return redirect()->route('project.show', $project);
    }

    /**
     * Show the specified resource.
     * @param Project $project
     * @return Response
     */
    public function show(Project $project)
    {
        return view('projects::show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Project $project
     * @return Response
     */
    public function edit(Project $project)
    {
        return view('projects::edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     * @param Project $project
     * @param  Request $request
     * @return Response
     */
    public function update(Project $project, Request $request)
    {
        $project->currentProject($project)->update(['title' => $request->title]);

        return redirect()->route('project.show', $project->id);
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

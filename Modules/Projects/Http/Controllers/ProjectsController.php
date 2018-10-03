<?php

namespace Modules\Projects\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Projects;


class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Projects $projects
     * @return Response
     */
    public function index(Projects $projects)
    {
        $project = $projects->asc()->simplePaginate(5);

        return view('projects::index', compact('project'));
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
     * @param  Request $request
     * @param Projects $projects
     * @return Response
     */
    public function store(Request $request, Projects $projects)
    {
        $projects->title = $request->title;
        $projects->save();

        return redirect()->route('projects.show', $projects->id);
    }

    /**
     * Show the specified resource.
     * @param Projects $projects
     * @return Response
     * @param int $id
     */
    public function show(Projects $projects, $id)
    {
        $project = $projects->find($id);

        return view('projects::show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Projects $projects
     * @return Response
     * @param int $id
     */
    public function edit(Projects $projects, $id)
    {
        $project = $projects->find($id);

        return view('projects::edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     * @param Projects $projects
     * @param  Request $request
     * @param int $id
     * @return Response
     */
    public function update(Projects $projects,Request $request, $id)
    {
        $project = $projects->find($id);
        $project->title = $request->title;
        $project->save();

        return redirect()->route('projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     * @param Projects $projects
     * @param int $id
     * @return Response
     */
    public function destroy(Projects $projects, $id)
    {
        $project = $projects->find($id);
        $project->delete();

        return redirect()->route('projects.index');

    }
}

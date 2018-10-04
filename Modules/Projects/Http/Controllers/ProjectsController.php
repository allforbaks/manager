<?php

namespace Modules\Projects\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Projects\Model\Project;


class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $projects = new Project;
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
     * @return Response
     */
    public function store(Request $request)
    {
        $projects = new Project;
        $projects->title = $request->title;
        $projects->save();

        return redirect()->route('projects.show', $projects->id);
    }

    /**
     * Show the specified resource.
     * @param Project $projects
     * @return Response
     * @param int $id
     */
    public function show( $id)
    {
        $project = Project::find($id);

        return view('projects::show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     * @param int $id
     */
    public function edit($id)
    {
        $project = Project::find($id);

        return view('projects::edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $project->title = $request->title;
        $project->save();

        return redirect()->route('projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Project::find($id)->delete();

        return redirect()->route('projects.index');

    }
}

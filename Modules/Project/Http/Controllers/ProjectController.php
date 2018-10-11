<?php

namespace Modules\Project\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Project\Entities\Project;
use Modules\Profile\Entities\User;
use Modules\Admin\Entities\Price;
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
     * @param Price $price
     * @param Project $project
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create(Price $price, Project $project, User $user)
    {
        if ( $user->balance < $price->first()->project )
        {
            return redirect()->route('project.index')->with('error', 'Недостаточно средств на счету. Пополните баланс!');
        } else {
            return view('project::create');
        }
    }

    /**
     * @param Price $price
     * @param Project $project
     * @param CreateProject $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Price $price, Project $project, CreateProject $request, User $user)
    {
        $user->balance -= $price->first()->project;
        $user->save();

        $project->create(['title' => $request->title,
            'user_id' => auth()->user()->id]);

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

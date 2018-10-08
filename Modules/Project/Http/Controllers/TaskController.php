<?php

namespace Modules\Project\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Project\Entities\Project;
use Modules\Project\Entities\Task;
use Modules\Task\Http\Requests\CreateTask;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('task::index');
    }

    /**
     * Show the form for creating a new resource.
     * @param Task $task
     * @param Project $project
     * @return Response
     */
    public function create(Project $project, Task $task)
    {
        return view('project::addTask', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Task $task
     * @param  CreateTask $request
     * @return Response
     */
    public function store(Task $task, CreateTask $request)
    {
        $task->create(['urgency' => $request->urgency,
                        'project_id' => $request->project_id,
                        'start_at' => $request->start_at,
                        'finish_at' => $request->finish_at,
                        'title' => $request->title,
                        'description'=> $request->description,
                        'file' => $request->file('file')->store('uploads', 'public')]);

        return redirect()->route('project.index');

    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('task::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('task::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}

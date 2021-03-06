<?php

namespace Modules\Project\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Project\Entities\Project;
use Modules\Project\Entities\Task;
use Modules\Admin\Entities\Price;
use Modules\Project\Http\Requests\CreateTask;

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
     * @param Price $price
     * @param Project $project
     * @return Response
     */
    public function create(Price $price, Project $project, Task $task)
    {
        $balance = auth()->user()->balance;

        if ( $balance < $price->first()->task )
        {
            return redirect('projects/' . $project->id)->with('error', 'Недостаточно средств на счету. Пополните баланс!');
        } else {
            return view('project::addTask', compact('project', 'task'));
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Project $project
     * @param Price $price
     * @param Task $task
     * @param  CreateTask $request
     * @return Response
     */
    public function store(Price $price, Task $task, CreateTask $request, Project $project)
    {
        auth()->user()->balance -= $price->first()->task;
        auth()->user()->save();

        $task->create([
            'urgency' => $request->urgency,
            'project_id' => $request->project_id,
            'start_at' => $request->start_at,
            'finish_at' => $request->finish_at,
            'title' => $request->title,
            'description' => $request->description,
            'file' => $request->file('file')->store('uploads', 'public')
        ]);

        return redirect('projects/' . $project->id)->with('success', 'Задача добавлена успешно!');

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
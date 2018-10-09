<?php
namespace Modules\Project\Http\Library\Services;

Class TaskService
{
    public function checkBalance($project, $task)
    {
        $balance = auth()->user()->balance;

        if ( $balance < 10 )
        {
            return redirect('projects/' . $project->id)->with('error', 'Недостаточно средств на счету. Пополните баланс!');
        } else {
            return view('project::addTask', compact('project', 'task'));
        }
    }
}
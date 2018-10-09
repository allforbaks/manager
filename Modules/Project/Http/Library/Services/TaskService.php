<?php
namespace Modules\Project\Http\Library\Services;

Class TaskService
{
    /**
     * @param $project
     * @param $task
     * @param $price
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function checkBalance($project, $task, $price)
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
     * @param $price
     */
    public function addTask($price)
    {
        auth()->user()->balance -= $price->first()->task;
        auth()->user()->save();
    }
}
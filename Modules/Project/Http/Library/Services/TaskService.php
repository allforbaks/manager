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
    public function addTask($price, $request, $task)
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
    }
}
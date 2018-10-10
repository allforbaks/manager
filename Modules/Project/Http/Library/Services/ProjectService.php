<?php
namespace Modules\Project\Http\Library\Services;

Class ProjectService
{
    /**
     * @param $project
     * @param $price
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function checkBalance($project, $price)
    {
        $balance = auth()->user()->balance;
        if ( $balance < $price->first()->project )
        {
            return redirect('projects')->with('error', 'Недостаточно средств на счету. Пополните баланс!');
        } else {
            return view('project::create');
        }
    }

    /**
     * @param $price
     */
    public function addProject($price, $project, $request)
    {
        auth()->user()->balance -= $price->first()->project;
        auth()->user()->save();

        $project->create(['title' => $request->title,
            'user_id' => auth()->user()->id]);
    }


}
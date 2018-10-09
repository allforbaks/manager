<?php
namespace Modules\Project\Http\Library\Services;

Class ProjectService
{
    public function checkBalance($project)
    {
        $balance = auth()->user()->balance;
        if ( $balance < 100 )
        {
            return redirect('projects')->with('error', 'Недостаточно средств на счету. Пополните баланс!');
        } else {
            return view('project::create');
        }
    }
}
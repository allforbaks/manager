<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Profile\Entities\User;
use Modules\Project\Entities\Project;
use Modules\Admin\Entities\Price;
use Modules\Admin\Entities\Role;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param User $user
     * @return Response
     */
    public function indexUser(User $user)
    {
        $users = $user->latest()->simplePaginate(10);

        return view('admin::indexUsers', compact('users'));
    }

    /**
     * Display a listing of the resource.
     * @param Project $project
     * @return Response
     */
    public function indexProject(Project $project)
    {
        $projects = $project->latest()->simplePaginate(10);

        return view('admin::indexProjects', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @param Price $price
     * @return Response
     */
    public function show(Price $price)
    {
        $prices = $price->latest()->first();

        return view('admin::show', compact('prices'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @param Price $price
     * @return Response
     */
    public function update(Request $request, Price $price)
    {
        $price->getPrice()->update(['project' => $request->project,
                                    'task' => $request->task]);

        return redirect()->route('admin.price')->with('success', 'Данные успешно обновлены');

    }

    /**
     * Remove the specified resource from storage.
     * @param  User $user
     * @return Response
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroyUser(User $user)
    {
        $user->delete();

        return redirect()->route('admin.user');
    }

    /**
     * Remove the specified resource from storage.
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroyProject(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.project');
    }
}

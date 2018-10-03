<?php

namespace Modules\Profile\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Models\Users;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Users $users
     * @param Request $request
     * @return Response
     */
    public function index(Users $users)
    {
        $user = Users::getCurrentUser();
        return view('profile::index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     * @return Response
     */
    public function store()
    {
    }

    /**
     * Show the specified resource.
     * @param Users $users
     * @return Response
     * @param int $id
     */
    public function show(Users $users, $id)
    {
        $user = $users->find($id);
        return view('profile::show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     * @param Users $users
     * @param  Request $request
     * @param int $id
     * @return Response
     */
    public function update(Users $users,Request $request, $id)
    {
        $user = $users->find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $request->image;
        $user->save();

        return redirect()->route('profile.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     * @param Users $users
     * @param int $id
     * @return Response
     */
    public function destroy(Users $users, $id)
    {
        $user = $users->find($id);
        $user->delete();

        return redirect()->route('home');

    }
}

<?php

namespace Modules\Profile\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Profile\Entities\User;
use Modules\Profile\Http\Requests\UpdateProfile;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ProfileController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
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
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
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
     * @param User $user
     * @param  Request $request
     * @return Response
     */
    public function update(User $user, UpdateProfile $request)
    {
        $user->currentUser($user)->update(['name' => $request->name,
                                            'email' => $request->email,
                                            'image' => $request->file('image')->store('uploads', 'public')]);

        return redirect()->route('profile.show', $user);
    }

    /**
     * Remove the specified resource from storage.
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('home');

    }
}

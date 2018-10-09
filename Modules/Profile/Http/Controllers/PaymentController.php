<?php

namespace Modules\Profile\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Profile\Entities\User;
use Modules\Profile\Entities\Payment;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('profile::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('profile::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param User $user
     * @param Payment $payment
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request, User $user, Payment $payment)
    {
        $user->balance += $request->value;
        $user->save();

        $payment->create(['value' => $request->value,
                        'user_id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email]);

        return redirect()->route('profile.show', $user);
    }

    /**
     * Show the specified resource.
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
        return view('profile::payment', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('profile::edit');
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

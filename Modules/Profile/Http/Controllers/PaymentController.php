<?php

namespace Modules\Profile\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Profile\Entities\User;
use Modules\Profile\Entities\Payment;
use Modules\Profile\Http\Library\Services\PaymentService;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param User $user
     * @return Response
     */
    public function index(User $user)
    {
        return view('profile::result', compact('user'));
    }

    /**
     * Show the form for requisites for payment
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cart(Request $request, User $user)
    {
        $value = $request->value;

        return view('profile::cart', compact('value', 'user'));
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
     * @param User $user
     * @param Payment $payment
     * @param  Request $request
     * @param PaymentService $service
     * @return Response
     */
    public function store(Request $request, User $user, Payment $payment, PaymentService $service)
    {
        echo $service->pay($payment, $user, $request);
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

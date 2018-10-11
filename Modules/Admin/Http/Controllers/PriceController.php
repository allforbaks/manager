<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Price;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin::index');
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
     * @param Price $price
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Price $price)
    {
        $prices = $price->first();

        return view('admin::show_prices', compact('prices'));
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
     * @param Request $request
     * @param Price $price
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Price $price)
    {
        $price->getPrice()->update(['project' => $request->project,
            'task' => $request->task]);

        return redirect('admin.price')->with('success', 'Данные успешно обновлены');
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}

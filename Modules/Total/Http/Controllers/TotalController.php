<?php

namespace Modules\Total\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TotalController extends Controller
{
    /**
     * @name 统计图-柱
     * @is_menu 1
     */
    public function totalZ()
    {
        return view('total::index');
    }

    /**
     * @name 统计图-饼
     * @is_menu 1
     */
    public function totalB()
    {
        return view('total::b');
    }

    /**
     * @name 统计图-线
     * @is_menu 1
     */
    public function totalQ()
    {
        return view('total::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('total::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('total::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}

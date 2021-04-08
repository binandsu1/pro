<?php

namespace Modules\Total\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TotalController extends Controller
{
    /**
     * @name Layer
     * @is_menu 1
     */
    public function totalZ()
    {
        return view('total::z');
    }

    /**
     * @name Vue
     * @is_menu 1
     */
    public function totalB()
    {
        return view('total::b');
    }

    /**
     * @name xxxx
     * @is_menu 1
     */
    public function totalQ()
    {
        return view('total::q');
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

    public function getData(){

        $data[0]["name"] = '张珊珊';
        $data[0]["sex"] = '男';
        $data[0]["address"] = '北京';
        $data[0]["check"] = false;
        $data[1]["name"] = '秦素素';
        $data[1]["sex"] = '女';
        $data[1]["address"] = '通辽';
        $data[1]["check"] = false;
        $data[2]["name"] = '张丽丽';
        $data[2]["sex"] = '男';
        $data[2]["address"] = '上海';
        $data[2]["check"] = false;
        $data[3]["name"] = '里丽丽';
        $data[3]["sex"] = '男';
        $data[3]["address"] = '北京';
        $data[3]["check"] = false;
        $data[4]["name"] = '哈丽丽';
        $data[4]["sex"] = '男';
        $data[4]["address"] = '上海';
        $data[4]["check"] = false;
        $data[5]["name"] = '是丽丽';
        $data[5]["sex"] = '男';
        $data[5]["address"] = '北京';
        $data[5]["check"] = false;
        return json_encode($data);
    }
}

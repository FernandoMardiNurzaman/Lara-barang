<?php

namespace App\Http\Controllers;

use toastr;
use App\Condition;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.condition.index', ['conditions' => Condition::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'condition_name' => 'required'
        ]);

        Condition::create($request->all());
        toastr()->success('Kondisi berhasil disimpan');
        return redirect()->route("condition.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function show(Condition $condition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("admin.condition.edit", ['condition' => Condition::findOrFail($id), 'conditions' => Condition::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Condition $condition)
    {
        $condition->condition_name = $request->condition_name;
        $condition->save();
        toastr()->success('Kondisi berhasil diubah');
        return redirect()->route("condition.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Condition $condition)
    {
        $condition->delete();
        toastr()->success('Kondisi berhasil dihapus');
        return redirect()->route("condition.index");
    }
}

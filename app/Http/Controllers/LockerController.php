<?php

namespace App\Http\Controllers;

use App\Locker;
use Illuminate\Http\Request;

class LockerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.locker.index', ['lockers' => Locker::all()]);
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
            'locker_name' => 'required|max:20'
        ]);
        Locker::create($request->all());
        toastr()->success('Data Locker berhasil disimpan');
        return redirect()->route("locker.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Locker  $locker
     * @return \Illuminate\Http\Response
     */
    public function show(Locker $locker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Locker  $locker
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.locker.edit', ['locker' => Locker::findOrFail($id), 'lockers' => Locker::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Locker  $locker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Locker $locker)
    {
        $request->validate([
            'locker_name' => 'required|max:20'
        ]);

        $locker->locker_name = $request->locker_name;
        $locker->save();
        toastr()->success('Data Locker berhasil diubah');
        return redirect()->route("locker.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Locker  $locker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Locker $locker)
    {
        $locker->delete();
        toastr()->success('Data Locker berhasil dihapus');
        return redirect()->route("locker.index");
    }
}

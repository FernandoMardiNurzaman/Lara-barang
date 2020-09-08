<?php

namespace App\Http\Controllers;

use App\User;
use App\Status;
use App\Schedule;
use Illuminate\Http\Request;
use App\Exports\ScheduleExcel;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(' admin.schedule.index', ['schedules' => Schedule::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.schedule.create', ['statuses' => Status::all(), 'users' => User::all()]);
    }

    public function getData()
    {
        $data = Schedule::latest();
        $index = 1;
        return DataTables::of($data)
            ->addColumn('no', function ($data) use ($index) {
                return $index;
            })
            ->addColumn('tanggal_mulai', function ($data) {
                return $data->created_at->diffForHumans();
            })
            ->addColumn('status', function ($data) {
                return '<a href="' . route("admin.schedule.update.status", $data->id) . '"
                            class="btn btn-info btn-sm">' . $data->status->nama_status . '</a>
                ';
            })
            ->addColumn('user_name', function ($data) {
                return $data->user->name;
            })
            ->addColumn('updated', function ($data) {
                if ($data->updated_at != $data->created_at) {
                    return $data->updated_at->diffForHumans();
                } else {
                    return '';
                }
            })
            ->addColumn('action', function ($data) {
                return ' <a href="' . route("schedule.edit", $data->id) . '"
                            class="btn btn-sm btn-warning d-inline mr-1">
                            <i class="fas fa-edit mr-2"></i>edit
                        </a>
                        <form action="' . route("schedule.destroy", $data->id) . '" method="POST" class="d-inline">
                            <input type="hidden" name="_token" value="' . csrf_token() . '">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="' . "return confirm('Hapus data ini?')" . '">
                                <i class="fas fa-trash mr-2"></i>hapus
                            </button>
                        </form>';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Schedule::create(
            $request->validate([
                'user_id' => 'required',
                'schedule_name' => 'required',
                'declaration' => 'required',
            ]) + [
                'status_id' => 1
            ]
        );
        toastr()->success('Agenda kerja berhasil ditambahkan');
        return redirect()->route("schedule.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view(
            'admin.schedule.edit',
            [
                'schedule' => Schedule::findOrFail($id),
                'schedules' => Schedule::all(),
                'statuses' => Status::all(),
                'users' => User::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'user_id' => 'required',
            'schedule_name' => 'required',
            'declaration' => 'required'
        ]);

        $schedule->user_id = $request->user_id;
        $schedule->schdeule_name = $request->schedule_name;
        $schedule->declaration = $request->declaration;
        $schedule->save();
        toastr()->success('Agenda Kerja berhasil diubah');
        return redirect()->route("schedule.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        toastr()->success('Agenda Kerja berhasil berhasil Di hapus');
        return redirect()->route("schedule.index");
    }

    public function updateStatus($id)
    {
        $schedule = Schedule::findOrFail($id);
        if ($schedule->status_id == 1) {
            $schedule->status_id = 2;
        } else {
            $schedule->status_id = 1;
            $schedule->updated_at = $schedule->created_at;
        }
        $schedule->save();
        toastr()->success('Status berhasil diubah');
        return back();
    }

    public function exportExcel()
    {
        $fileName = "Agenda-kerja" . time() . ".xlsx";
        return Excel::download(new ScheduleExcel, $fileName);
    }
}

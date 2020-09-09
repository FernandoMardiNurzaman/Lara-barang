<?php

namespace App\Exports;

use App\Schedule;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ScheduleExcel implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('exports.scheduleExcel', ['Schedule' => Schedule::all()]);
    }
}

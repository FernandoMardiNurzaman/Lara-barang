<?php

namespace App\Exports;

use App\ItemExit;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ItemExitExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('exports.item-exit', [
            'itemExit' => ItemExit::all()
        ]);
    }
}

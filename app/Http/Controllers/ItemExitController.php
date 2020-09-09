<?php

namespace App\Http\Controllers;

// use App\Category;
use App\Customer;
use App\Exports\ItemExitExport;
use App\Item;
use App\ItemExit;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class ItemExitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.itemExit.index', ['itemExit' => ItemExit::all(), 'customer' => Customer::all(), 'item' => Item::all()]);
    }

    public function getData()
    {
        $data = ItemExit::latest();
        $index = 1;
        return DataTables::of($data)
            ->addIndexColumn()
            ->addcolumn('customer', function ($data) {
                return $data->customer->customer_name;
            })
            ->addcolumn('item', function ($data) {
                return $data->item->item_name;
            })
            ->addcolumn('ip_adrress', function ($data) {
                return $data->ip_adrress;
            })
            ->addcolumn('backbond', function ($data) {
                return $data->backbond;
            })
            ->addColumn('action', function ($itemExit) {
                return '
                <a href="' . route("exit.edit", $itemExit->id) . '" class="btn btn-sm btn-warning d-inline mr-1">
                <i class="fas fa-edit mr-2"></i>edit</a>
                 <a href="' . route("exit.show", $itemExit->id) . '" class="btn btn-primary btn-sm d-inline">
                 <i class="far fa-eye mr-1"></i>Detail</a>
                <form action="' . route("exit.destroy", $itemExit->id) . '" method="POST" class="d-inline">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger btn-sm" onclick="' . "return confirm('Hapus data ini?')" . '"><i class="fas fa-trash mr-2"></i>hapus</button>
                </form>
                ';
            })
            ->rawColumns(['customer', 'item', 'ip_adrress', 'backbond', 'action'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $items = \DB::table('items')
        //     ->select('items.*')
        //     ->where('condition_id', '1')
        //     ->orWhere('condition_id', '2')
        //     ->get();
        return view('admin.ItemExit.create', ['customer' => Customer::all(), 'items' => Item::with('condition')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        ItemExit::create(
            $request->validate([
                'customer_id' => 'required',
                'item_id' => 'required',
                'ip_adrress' => 'required|ipv4',
                'backbond' => 'required|ipv4',
            ]) + ['user_id' => \Auth::user()->id]
        );

        toastr()->success('Barang berhasil disimpan');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ItemExit  $itemExit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd(ItemExit::with('user')->findOrFail($id));
        return view('admin.itemExit.show', ['itemExit' => ItemExit::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ItemExit  $itemExit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.itemExit.edit', [
            'exit' => ItemExit::findOrFail($id),
            'customer' => Customer::all(),
            'items' => Item::with('condition')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ItemExit  $itemExit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemExit $itemExit)
    {
        $request->validate([
            'customer_id' => 'required',
            'item_id' => 'required',
            'ip_adrress' => 'required|ip',
            'backbond' => 'required|ip'
        ]);
        $itemExit->customer_id = $request->customer_id;
        $itemExit->item_id = $request->item_id;
        $itemExit->ip_adrress = $request->ip_adrress;
        $itemExit->backbond = $request->backbond;
        $itemExit->save();
        toastr()->success('Data berhasil di Edit');
        return redirect()->route('exit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ItemExit  $itemExit
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemExit $itemExit)
    {
        $itemExit->delete();
        toastr()->success('Data berhasil Dihapus');
        return redirect()->route('exit.index');
    }

    public function exportExcel()
    {
        $fileName = "data-barang-" . time() . ".xlsx";
        return Excel::download(new ItemExitExport, $fileName);
    }

    public function exportPdf($id)
    {

        set_time_limit(300);
        $fileName = "data-barang-" . time() . ".pdf";
        $item = ItemExit::findOrFail($id);
        $pdf = \PDF::setOptions([
            'isRemoteEnabled' => true
        ])
            ->loadView('exports.item-exit-pdf', ['itemExit' => $item]);
        return $pdf->stream($fileName, $pdf);
    }
}

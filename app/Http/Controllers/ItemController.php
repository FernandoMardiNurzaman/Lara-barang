<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use App\Condition;
use App\Exports\ItemExitExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.item.index", ['items' => Item::all()]);
        // $items = Item::all();
        // return DataTables::of($items)
        // ->
        // return $dataTables->eloquent($items)->toJson();
    }

    public function getData()
    {
        $data = Item::latest();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($item) {
                return '
                <a href="' . route("item.edit", $item->id) . '" class="btn btn-sm btn-warning d-inline mr-1">
                <i class="fas fa-edit mr-2"></i>edit</a>
                 <a href="' . route("item.show", $item->id) . '" class="btn btn-primary btn-sm d-inline">
                 <i class="far fa-eye mr-1"></i>Detail</a>
                <form action="' . route("item.destroy", $item->id) . '" method="POST" class="d-inline">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger btn-sm" onclick="' . "return confirm('Hapus data ini?')" . '"><i class="fas fa-trash mr-2"></i>hapus</button>
                </form>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.item.create", ['categories' => Category::all(), 'conditions' => Condition::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName = time() . '.' . $request->photo->extension();
        $request->file('photo')->move(public_path('uploads/images'), $fileName);

        Item::create(
            $request->validate([
                'condition_id' => 'required',
                'category_id' => 'required',
                'code' => 'required',
                'item_name' => 'required',
                'price' => 'required',
                'fromWhere' => 'required',
                'fault_items' => 'required',
                ''
            ]) + ['photo' => $fileName]
        );

        toastr()->success('Barang berhasil disimpan');
        return redirect()->route("item.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)

    {

        return view("admin.item.show", compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $conditions = Condition::all();
        $categories = Category::all();

        return view("admin.item.edit", compact('item', 'conditions', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'condition_id' => 'required',
            'category_id' => 'required',
            'code' => 'required',
            'item_name' => 'required',
            'price' => 'required',
            'fromWhere' => 'required',
        ]);

        if ($request->file('photo')) {
            $path = public_path("uploads/images") . "/" . $item->photo;
            unlink($path);
            $fileName = time() . '.' . $request->photo->extension();
            $request->file('photo')->move(public_path('uploads/images'), $fileName);

            $item->condition_id = $request->condition_id;
            $item->category_id = $request->category_id;
            $item->code = $request->code;
            $item->item_name = $request->item_name;
            $item->price = $request->price;
            $item->fromWhere = $request->fromWhere;
            $item->fault_items = $request->fault_items;
            $item->photo = $fileName;
            $item->save();
        } else {
            $item->condition_id = $request->condition_id;
            $item->category_id = $request->category_id;
            $item->code = $request->code;
            $item->item_name = $request->item_name;
            $item->price = $request->price;
            $item->fromWhere = $request->fromWhere;
            $item->fault_items = $request->fault_items;
            $item->save();
        }

        toastr()->success('Barang berhasil diubah');
        return redirect()->route("item.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        toastr()->success('Barang berhasil dihapus');
        return redirect()->route("item.index");
    }

    public function exportExcel()
    {
        $fileName = "data-barang-" . time() . ".xlsx";
        return Excel::download(new ItemExitExport, $fileName);
    }
}

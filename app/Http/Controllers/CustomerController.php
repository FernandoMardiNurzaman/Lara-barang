<?php

namespace App\Http\Controllers;

use App\Item;
use App\Customer;
use Illuminate\Http\Request;
use App\Exports\ScheduleExcel;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.customer.index', ['customers' => Customer::all()]);
    }

    public function getData()
    {
        $data = Customer::latest();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($customer) {
                return '
                <a href=" ' . route("customer.edit", $customer->id) . '"
                    class="btn btn-sm btn-warning d-inline mr-1">
                    <i class="fas fa-edit mr-2"></i>edit
                </a>
                <form action="' . route("customer.destroy", $customer->id) . '" method="POST"
                    class="d-inline">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="' . "return confirm('Hapus data ini?')" . '">
                        <i class="fas fa-trash mr-2"></i>hapus
                    </button>
                </form>
                ';
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
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $customer =  $request->validate([
            'customer_name' => 'required|max:30',
            'addrees' => 'required|max:100',
            'bandwith' => 'required|numeric',
            'price' => 'required|string',
            'height_tower' => 'required|numeric',
            'informasion' => 'required|max:50',
        ]);
        // dd(s);
        Customer::create($customer);
        toastr()->success('Data Pelanggan berhasil disimpan');
        return redirect()->route("customer.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("admin.customer.edit", ['customer' => Customer::findOrFail($id), 'customers' => Customer::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'customer_name' => 'required|max:30',
            'addrees' => 'required|max:100',
            'bandwith' => 'required|string',
            'price' => 'required|string',
            'height_tower' => 'required|numeric',
            'informasion' => 'required|max:50',
        ]);

        // Customer::where('id', $request->id)->update($request->all());
        $customer->customer_name = $request->customer_name;
        $customer->addrees = $request->addrees;
        $customer->bandwith = $request->bandwith;
        $customer->price = $request->price;
        $customer->height_tower = $request->height_tower;
        $customer->informasion = $request->informasion;
        $customer->save();
        toastr()->success('Data Pelanggan berhasil Di edit');
        return redirect()->route("customer.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        toastr()->success('Data Pelanggan berhasil dihapus');
        return redirect()->route("customer.index");
    }

    public function exportExcel()
    {
        $fileName = "pelanggan-" . time() . ".xlsx";
        return Excel::download(new ScheduleExcel, $fileName);
    }
}

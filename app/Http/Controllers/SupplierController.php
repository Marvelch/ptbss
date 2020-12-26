<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SupplierModel;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('supplier.supplier');
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
        $supplier = SupplierModel::create([
            'kode'      => $request->get('kode'),
            'nama'      => $request->get('nama'),
            'alamat'     => $request->get('alamat'),
            'kota'    => $request->get('kota'),
            'status'      => $request->get('status'),
            'notelpon'   => $request->get('notelpon'),
            'fax'   => $request->get('fax'),
            'pic'   => $request->get('pic'),
        ]);

        $supplier->save();

        return redirect('/supplier')->with('success', 'Pengisian Data Supplier Baru Berhasil !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suppliers = SupplierModel::where('id',$id)->get();

        return view('supplier.edit')->with('suppliers',$suppliers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $suppliers_update = SupplierModel::where('id',$id)->update([
            'nama'      => $request->nama,
            'kode'      => $request->kode,
            'alamat'    => $request->alamat,
            'kota'      => $request->kota,
            'status'    => $request->status,
            'notelpon'  => $request->notelpon,
            'fax'       => $request->fax,
            'pic'       => $request->pic,
        ]);

        return redirect('suppliers')->with('success','Perubahaan Data Supplier Berhasil !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function supplier()
    {
        $supplier_data = SupplierModel::all();

        return view('supplier.data_supplier')->with('suppliers',$supplier_data);
    }
}

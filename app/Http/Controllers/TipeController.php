<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipeModel;

class TipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('types.tipe');
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
        $tipe = TipeModel::create([
                'nama' => $request->get('nama'),
                'kode' => $request->get('kode'),
                'tipe' => $request->get('tipe'),
        ]);

        $tipe->save();

        return redirect('/data_tipe')->with('success', 'Data Berhasil Tersimpan !');
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

        $data_tipe = TipeModel::where('id',$id)->get();

        return view('types.edit')->with('data_tipe',$data_tipe);
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
        TipeModel::where('id',$id)->update([
            'nama'  => $request->nama,
            'kode'  => $request->kode,
            'status'  => $request->status,
        ]);

        return redirect('/data_tipe')->with('success','Berhasil Melakukan Perubahaan !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // TipeModel::WHERE('id',$id)->delete();

        // return redirect('/data_tipe')->with('success','Penghapusan Data Berhasil !');
    }

    public function data_tipe()
    {
        $tipe = TipeModel::all();

        return view('types.data_tipe')->with('tipe',$tipe);
    }
}

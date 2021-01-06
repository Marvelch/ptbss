<?php

namespace App\Http\Controllers;

use App\KartuStokModel;
use App\PermintaanModel;
use App\Product;
use Illuminate\Http\Request;
use App\ProductModel;
use PDF;

class KartuStokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prints = ProductModel::all();

        return view('kartustok.kartustok')->with('prints',$prints);
    }

    /**
     * Print Data.
     *
     * @return \Illuminate\Http\Response
     */
    public function cetak(Request $request)
    {
        $kode = $request->kodebarang;

        $prints = ProductModel::where('kode',$kode)->get();
        
        foreach($prints as $print)
        {
            $ids = $print->id;
        }

        $permintaans = PermintaanModel::where('product_id',$ids)->get();

        $KartuStok = KartuStokModel::where('kode_product',$kode)->get();

        return view('kartustok.print')->with('prints',$prints)
                                      ->with('permintaans',$permintaans)
                                      ->with('KartuStok',$KartuStok);
    }

    public function cetak_pdf(Request $request,$id)
    {
        $results = ProductModel::where('kode',$id)->get();

        foreach($results as $result)
        {
            $hasil = $result->id;
        }
        
        $permintaans = PermintaanModel::where('product_id',$hasil)->get();

        $hasils = 0;

        foreach($permintaans as $permintaan)
        {
            $hasils += $permintaan->jumlah;
        }

        $KartuStok = KartuStokModel::where('kode_product',$id)->get();

        foreach($KartuStok as $Kartu)
        {
            $totalsaldo[] = $Kartu->saldo;
        }

        $total = array_sum($totalsaldo);

    	$pdf = PDF::loadview('kartustok.kartustok_pdf',compact('results','permintaans','hasils','KartuStok','total'));
    	return $pdf->stream();
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
        //
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
        //
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
        //
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
}

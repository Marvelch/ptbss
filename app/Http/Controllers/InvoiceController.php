<?php

namespace App\Http\Controllers;

use App\InvoiceDetailModel;
use App\InvoiceModel;
use App\KartuStokModel;
use App\ProductModel;
use App\SementaraModel;
use Illuminate\Http\Request;
use Auth;
use session;
use Illuminate\Support\Facades\Redirect;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductModel::all();

        $kodes = InvoiceModel::all();

        if(count($kodes) > 0)
        {
            $KodeKeys = InvoiceModel::orderBy('created_at', 'DESC')->first();

            $kode[] = substr($KodeKeys->no_invoice,7)+1;

        }else{
            $kode[] = "0001";
        }

        // Mengambil data dari table sementara 
        $sementara = SementaraModel::where('idproduct',0)
                                    ->where('idsupplier',0)->get();
        
        if(count($sementara) > 0)
        {
                foreach($sementara as $smntr)
            {
                $hasil[] = ProductModel::where('id',$smntr->idinvoice)->get();
            }
        }else{
            $hasil = array();
        }
        
        return view('invoice.invoice',compact('products'))->with('kode',$kode)
                                                        ->with('hasil',$hasil);
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
        $userId = Auth::id();

       $product_id = $request->input('product_id');

       foreach($product_id as $product)
       {
           $Nol = 0;
           SementaraModel::create([
               'idinvoice'     => $product,
               'idsupplier'    => $Nol,
               'idproduct'     => $Nol,
               'iduser'        => $userId,
           ]);
       }

        return redirect()->back();
    }

    public function Store_All(Request $request)
    {
        // $Inv = InvoiceModel::create([
        //     'no_invoice'    => $request->kode,
        //     'tanggal'       => $request->tanggal,
        //     'keterangan'    => $request->keterangan,
        //     'sub_total'     => $request->sub_total,
        // ]);

        $looping = count($request->product_id);
        
        for($i=0;$i<$looping;$i++)
        {
            $stokbarang[] = ProductModel::where('id',$request->product_id[$i])->get();

            // $InvDetail = InvoiceDetailModel::create([
            //     'rel_no_invoice'    => $request->kode,
            //     'jumlah'            => $request->jumlah[$i],
            //     'harga'             => $request->harga[$i],
            //     'total'             => $request->harga[$i] * $request->jumlah[$i],
            //     'product_id'        => $request->product_id[$i],
            // ]);

            // KartuStokModel::create([
            //     'kode_product'      => $request->product_id[$i],
            //     'tanggal'           => date('Y-m-d'),
            //     'kode_transaksi'    => $request->kode,
            //     'masuk'             => "0",
            //     'keluar'            => $request->jumlah[$i],
            //     'saldo'             => $request->jumlah[$i],
            // ]);
        }

        return $stokbarang;
        // $InvDetail->save();

        // $Inv->save();

        // Session::flash('success', 'File has been uploaded successfully!');
        // return response()->json(['url'=>url('/Pag6/Invoice')]);
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

    public function DeleteInvo()
    {
        SementaraModel::where('idproduct',0)
                        ->where('idsupplier',0)->delete();

        return Redirect()->back();
    }
}

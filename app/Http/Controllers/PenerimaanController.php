<?php

namespace App\Http\Controllers;

use App\KartuStokModel;
use App\PenerimaanModel;
use App\Permintaan;
use App\PermintaanHasMany;
use App\PermintaanModel;
use App\ProductModel;
use App\SupplierModel;
use Illuminate\Http\Request;
use Session;

class PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Suppliers      = SupplierModel::All();
        $Permintaans    = PermintaanModel::All();
        $Products       = ProductModel::all();

        $GetPengkodean = PenerimaanModel::orderBy('id', 'DESC')->first();

        if(is_null($GetPengkodean))
        {
            $Kode[]       = 1;
        }else{
            $KodeID       = substr(($GetPengkodean->no_rpo),8)+1;
            $Kode[]       = $KodeID;
        }

        return view('penerimaan.penerimaan')->with('Suppliers',$Suppliers)
                                            ->with('Permintaans',$Permintaans)
                                            ->with('Kode',$Kode)
                                            ->with('Permintaans',$Permintaans)
                                            ->with('Products',$Products);
    }

    public function Jsonsupplier($id)
    {
        $suppliers = SupplierModel::where('id',$id)->get();

        return response()->json($suppliers);
    }

    public function JsonKodePermintaan($id)
    {
        $hasil = PermintaanModel::where('supplier_id',$id)->get();

        // $hasilfilter[] = $hasil->pluck("kodepermintaan","id")->toArray();
        
        foreach($hasil->unique('kodepermintaan') as $filter)
        {
            $hasilfilter[] = $filter->pluck('kodepermintaan','supplier_id')->toArray();
            
            return response()->json($hasilfilter);
        }
    }

    public function DataPermintaan($id)
    {
        $DataPermintaan['data'] = PermintaanModel::where('kodepermintaan',$id)->get();
        $Data = PermintaanModel::where('kodepermintaan',$id)->get();

        foreach($Data as $Dkey)
        {
            // echo $Dkey->product_id;
            $Dkeys[]['ex'] = ProductModel::where('id',$Dkey->product_id)->get();
        }

        // return response()->json(Array($DataPermintaan,$Dkeys));
        echo json_encode(Array($DataPermintaan,$Dkeys));
        exit;
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
        // $this->validate($request, [
        //     'no_so'       => 'required',
        //     'delivery_order'    => 'required',
        //     'keterangan'        => 'required',
        // ],
        // [
        //     'no_so.required'      => 'Kolom Sales Order Tidak Boleh Kosong !',
        //     'delivery_order.required'   => 'Kolom Delivery Order Tidak Boleh Kosong !',
        //     'keterangan.required'       => 'Kolom Keterangan Tidak Boleh Kosong !',
        // ]);

        $ids = PermintaanModel::where('kodepermintaan',$request->kodepermintaan)->get();

        foreach($ids as $key => $value){
            PermintaanModel::where('id',$value->id)
                                        ->update([
                                            'status'     =>  "2",
                                            'diterima'   => $request->diterima[$key],
                                            'sisa'       => $request->jumlah[$key],
                                        ]);
        }

        $simpan = PenerimaanModel::create([
            'no_rpo'                => $request->no_rpo,
            'rel_kodepermintaan'    => $request->kodepermintaan,
            'tanggal'               => $request->tanggal,
            'sales_order'           => $request->no_so,
            'delivery_order'        => $request->no_do,      
        ]);

        for($i = 0; $i < count($request->idproducts);$i++)
        {
            $stokbarang = ProductModel::where('id',$request->idproducts[$i])->get();

            foreach($stokbarang as $stokhasil)
            {
                $laporan[] = $stokhasil->stok;
            }

            // Update data stok pada tabel kartu stok
            KartuStokModel::create([
                'kode_product'      =>  $request->kodeproduct[$i],
                'tanggal'           =>  $request->tanggal,
                'kode_transaksi'    =>  $request->no_rpo,
                'masuk'             =>  $request->diterima[$i],
                'keluar'            =>  "0",
                'saldo'             =>  $laporan[$i] + $request->diterima[$i],
                'keterangan'        =>  $request->keterangan,         
            ]);

            ProductModel::where('id',$request->idproducts[$i])->update([
                'stok' => $laporan[$i] + $request->diterima[$i],
            ]);


        }

        $simpan->save();

        return response()->json(['url'=>url('/Pag3/Penerimaan')]);
    }

    public function getpermintaan(Request $request, $id)
    {
        $DataPermintaans = PermintaanModel::where('id',$id)->get();

        return response()->json($DataPermintaans);
    }

    public function simpan(Request $request)
    {
        $hello = $request->status;

        return response()->json($hello);

        echo "disini";
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

    public function TestingUnit(Request $request)
    {
        $ids = PermintaanModel::where('kodepermintaan',$request->kodepermintaan)->get();

        echo $ids;
    }

}


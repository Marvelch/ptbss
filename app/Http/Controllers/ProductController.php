<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ProductModel;
use App\SementaraModel;
use App\TipeModel;
use App\SubTipeModel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $key = DB::table('product')->orderBy('id', 'DESC')->first();

        $keys = ProductModel::orderBy('id', 'DESC')->first();

        if(!empty($keys))
        {
            $key[] = $keys->id + 1;
        }else{
            $key[] = "1";
        }

        $tipe = TipeModel::all();

        $subtipe = SubTipeModel::all();

        $product_data = ProductModel::all();

        return view('products.products')->with('key',$key)->with('tipe',$tipe)->with('subtipe',$subtipe)->with('product_data',$product_data);
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
    
        $product = ProductModel::create([
                'kode'      => $request->get('kode'),
                'nama'      => $request->get('nama'),
                'harga'     => $request->get('harga'),
                'status'    => $request->get('status'),
                'stok'      => $request->get('stok'),
                'type_id'   => $request->get('type_id'),
                'subid'     => $request->get('subid'),
        ]);

        $product->save();
  
        return redirect('/data_produk')->with('success', 'Pengisian Data Produk Baru Berhasil !');
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
        if($id == Null)
        {
            $id = 0;
        }
        $data = ProductModel::where('id',$id)->get();
        $tipe = TipeModel::all();

        return view('products.edit')->with('data',$data)->with('tipe',$tipe);
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
        $product_up = ProductModel::where('id',$id)->update([
                'type_id'   => $request->type_id,
                'nama'      => $request->nama,
                'kode'      => $request->kode,
                'status'    => $request->status,
                'harga'     => $request->harga,
                'stok'      => $request->stok,
        ]);

        return redirect('/data_produk')->with('success','Berhasil Melakukan Perubahaan !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // echo $id;
        ProductModel::WHERE('id',$id)->delete();

        return redirect('/data_produk')->with('success','Penghapusan Data Berhasil !');
    }

    public function data_produk()
    {
        $products   = ProductModel::WHERE('status','Aktif')->get();
        $types      = TipeModel::all();
        $subtipes   = SubTipeModel::all();

        return view('products.data_products')->with('products',$products)->with('types',$types)->with('subtipes',$subtipes);
    }

}

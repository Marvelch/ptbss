<?php

namespace App\Http\Controllers;

use App\Permintaan;
use App\PermintaanModel;
use App\ProductModel;
use Illuminate\Http\Request;
use App\SementaraModel;
use App\SupplierModel;
use App\TransaksiModel;
use DB;
use Illuminate\Support\Facades\Auth;
use Hamcrest\Arrays\IsArray;
use App\PermintaanHasMany;
use App\Product;

class PermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Popup data supplier menampilkan semua data supplier 
        $ListSuppliers              = SupplierModel::all();

        $products                   = ProductModel::all();
        $sementaras                 = SementaraModel::all();

        // Mengambil ID Products
        $DataSementara_IDProducts   = SementaraModel::where('idsupplier',0)
                                                        ->where('iduser',Auth::id())->get(); 
        // Mengambil ID Supplier
        $DataSementara_IDSuppliers  = SementaraModel::where('idproduct',0)
                                                        ->where('iduser',Auth::id())->get();
        if($DataSementara_IDSuppliers->count() > 0)
        {
            // Mengambil data ID supplier dari tabel sementara

            foreach($DataSementara_IDSuppliers as $ID)
            {
            $IDsupp = $ID->idsupplier;

            $DataSuppliers = SupplierModel::where('id',$IDsupp)->get();
            } 
        }else{
            $DataSuppliers = array();
        }

        if($DataSementara_IDProducts->count() > 0)
        {
     
            foreach($DataSementara_IDProducts as $IDSementara)
            {
                // Get ID dari table sementara dan mencari berdasarkan id pada tabel product
                $DataProductsCount = ProductModel::where('id',$IDSementara->idproduct)->get();
                
                if($DataProductsCount->count() > 0 )
                {
                    $DataProducts[] = ProductModel::where('id',$IDSementara->idproduct)->get();
                    
                }else{
                    $DataProducts = array();
                }
            } 
        }else{
            $DataProducts = array();
        }

        $tanggal = date("Y-m");

        // Mengambil data dari tabel transaks
        $ceks = PermintaanModel::latest('created_at')->first();

        if(!empty($ceks))
        {
            $cekpermintaan[] = PermintaanModel::latest('created_at')->first();
            
            foreach($cekpermintaan as $cek)
            {
                // Cek apabila tanggal (data terakhir) sama dengan tanggal hari ini 
                $trimtanggal = $cek->tglpermintaan;

                if($tanggal == substr($trimtanggal,0,7))
                {
                    $kode = substr($cek->kodepermintaan,6)+1;
                    $kodes = sprintf("%03d", $kode);
                    $penggabungans[] = "TP".substr(date("Y"),2).date("m").$kodes;
                }else{
                    $kodes = "001";
                    $penggabungans[] = "TP".substr(date("Y"),2).date("m").$kodes;
                }
            }
        }else{
            $kodes = "001";
                $penggabungans[] = "TP".substr(date("Y"),2).date("m").$kodes;
        }
        

        // Mengambil data supplier 

        $GetSupplierSementara   = SementaraModel::all();

        if($GetSupplierSementara->count() > 0){
            
            $supplierlist_co = SementaraModel::where('iduser',Auth::id())->latest('created_at')->first();

            if($supplierlist_co == null)
            {
                $supplierdata[] = Array();
            }else{
                $supplierlists[] = SementaraModel::where('iduser',Auth::id())->latest('created_at')->first();

                foreach($supplierlists as $SupplierID)
                {
                    $supplierdata[] = SupplierModel::where('id',$SupplierID->idsupplier)->get();
                }
            }
            
        }else{
            $supplierdata[] = array();
        }

        return view('permintaan.permintaan')->with('DataSuppliers',$DataSuppliers)
                                            ->with('products',$products)
                                            ->with('sementaras',$sementaras)
                                            ->with('supplierdata',$supplierdata)
                                            ->with('DataProducts',$DataProducts)
                                            ->with('penggabungans',$penggabungans)
                                            ->with('ListSuppliers',$ListSuppliers);
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

    public function supplierstore(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // If cek apabila iduser sudah terdaftar pada database maka jalankan perintah

        $CheckID = SementaraModel::where('iduser',Auth::id())->get();

        if(count($CheckID) > 0)
        {
            if($request->get('idproduct') > 0 )
            {
                $Null = 0;
                SementaraModel::where('iduser',Auth::id())->update([
                    'idproduct' => $request->get('idproduct'),
                    'idsupplier' => $Null,
                    'iduser' => Auth::id(),
                ]);
                SementaraModel::WHERE('iduser',Auth::id())
                        ->where('idsupplier',0)->delete();
            }else{
                $Null = 0;
                SementaraModel::where('iduser',Auth::id())->update([
                    'idproduct' => $Null,
                    'idsupplier' => $request->get('idsupplier'),
                    'iduser' => Auth::id(),
                ]);
                SementaraModel::WHERE('iduser',Auth::id())
                        ->where('idsupplier',0)->delete();
            }
            return redirect('/permintaan'); 
            
        }else{
            
            if($request->get('idproduct') > 0 )
            {
                $Null = 0;
                SementaraModel::create([
                    'idproduct' => $request->get('idproduct'),
                    'idsupplier' => $Null,
                    'iduser' => Auth::id(),
                ]);

                SementaraModel::WHERE('iduser',Auth::id())
                        ->where('idsupplier',0)->delete();
            }else{
                $Null = 0;
                SementaraModel::create([
                    'idproduct' => $Null,
                    'idsupplier' => $request->get('idsupplier'),
                    'iduser' => Auth::id(),
                ]);

                SementaraModel::WHERE('iduser',Auth::id())
                        ->where('idsupplier',0)->delete();
            }
    
            return redirect('/permintaan');   
        }
    }

    /**
     * S_e function table permintaan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function savepermintaan(Request $request)
    {
        $count = count($request->kodepermintaan);

        for($i=0;$i<$count;$i++)
        {
            PermintaanModel::create([
                'jumlah'            =>  $request->qty[$i],
                'harga'             =>  $request->harga[$i],
                'product_id'        =>  $request->product_id[$i],
                'subtotal'          =>  $request->harga[$i] * $request->qty[$i],
                'kodepermintaan'    =>  $request->kodepermintaan[$i],
                'tglpermintaan'     =>  $request->tglpermintaan[$i],
                'supplier_id'       =>  $request->supplier_id[$i],
                'status'            =>  "0", // Status dengan status "0" sebagai default value
            ]);
        }
        
        // Hapus semua data pada tabel sementaras 

        SementaraModel::WHERE('iduser',Auth::id())->delete();
        // Kode untuk menghapus isi table sementara 
        
        return redirect('permintaan')->with('ssuccess','Permintaan Telah Berhasil !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $GetPermintaan = PermintaanModel::where('id',$id)->get();

        $GetSupplier    =   SupplierModel::all();

        $GetProduct     =   ProductModel::all();

        return view('permintaan.edit')->with('GetPermintaan',$GetPermintaan)
                                      ->with('GetSupplier',$GetSupplier)
                                      ->with('GetProduct',$GetProduct);
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
        SementaraModel::WHERE('id',$id)->delete();

        return redirect('/permintaan')->with('success','Penghapusan Data Berhasil !');
    }

    public function destroy_all()
    {
        // SementaraModel::truncate();
        SementaraModel::WHERE('iduser',Auth::id())
                        ->where('idsupplier',0)->delete();

        return redirect('/permintaan');
    }

    public function perminstaansementara(Request $request)
    {
        $userId = Auth::id();

        $permintaans = $request->input('check');

        foreach($permintaans as $permintaan)
        {
            $Nol = 0;
            SementaraModel::create([
                'idproduct'     => $permintaan,
                'idsupplier'    => $Nol,
                'iduser'        => $userId,
            ]);
        }

        return redirect('permintaan');
    }

    public function getCategory(Request $request)
    {

        if($request->get('query'))
        {
        $query = $request->get('query');
        $data = SupplierModel::where('nama', 'LIKE', "%{$query}%")->get();
        $output = '<ul class="dropdown-menu" style="display:block; position:relative; width: 100%; font-weight: bold; ">';
        foreach($data as $row)
        {
        $output .= '
        <li class="list-group-item">'.$row->nama.'</li>
        ';
        }
        $output .= '</ul>';
        echo $output;
        }
    }

    public function datapermintaan()
    {
        $DataPermintaan     = PermintaanModel::all();

        return view('permintaan.data_permintaan')->with('DataPermintaan',$DataPermintaan);
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = PermintaanModel::where('kodepermintaan', 'like', '%'.$query.'%')
         ->orderBy('created_at', 'desc')
         ->get();
      }
      else
      {
       
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->kodepermintaan.'</td>
         <td>'.$row->supplier_id.'</td>
         <td>'.$row->product_id.'</td>
         <td>'.$row->tglpermintaan.'</td>
         <td>'.$row->harga.'</td>
         <td>'.$row->status.'</td>
         <td>'.$row->subtotal.'</td>
         <td>'.$row->sisa.'</td>
         <td><a class="btn btn-primary" href="/permintaan/'.$row->id.'/edit"><i class="fas fa-edit"></i></a></td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="9"><i>Data Tidak Sedia</i></td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }

}
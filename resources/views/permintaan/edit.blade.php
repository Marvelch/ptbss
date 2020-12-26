@extends('layouts.admin')

@section('content_admin')
<div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">

    </div>
    
   <div class="row">
    <div class="col-lg-6 mb-4">

        <!-- Input Products -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Mengubah Data Permintaan</h6>
            </div>
            <div class="card-body">
                @foreach ($GetPermintaan as $Permintaan)
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Kode Permintaan</label>
                        <input type="text" class="form-control" value="{{$Permintaan->kodepermintaan}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Produk</label>
                        <select name="" id="" class="form-control">
                            <option value="">{{$Permintaan->id}}</option>
                            @foreach ($GetProduct as $ID)
                            <option value="">
                                @php
                                    if($Permintaan->id == $ID->product_id)
                                    {
                                        echo $ID->nama;
                                    }
                                @endphp
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Supllier</label>
                        <select name="" id="" class="form-control">
                            <option value="">{{$Permintaan->supplier_id}}</option>
                            @foreach ($GetSupplier as $Supplier)
                                <option value="">{{$Supplier->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah</label>
                        <input type="text" class="form-control" value="{{$Permintaan->jumlah}}">
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="text" class="form-control" value="<?php echo "Rp " . number_format($Permintaan->harga,0,',','.'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="" id="" class="form-control">
                            <option value="">
                                <?php
                                    if($Permintaan->status == 1)
                                    {
                                        echo "<p>&#x2714;</p> Dibuat";
                                    }elseif ($Permintaan->status == 2) {
                                        echo "<p>&#x2714;</p> Diproses";
                                    }elseif ($Permintaan->status == 3) {
                                        echo "<p>&#x2714;</p> Dibuat";
                                    }else {
                                        echo "<p>&#x2714;</p> Data Belum Tersedia";
                                    }
                                ?>
                            </option>
                            <option value="1">Dibuat</option>
                            <option value="2">Diposes</option>
                            <option value="3">Lunas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Total</label>
                        <input type="text" class="form-control" value="<?php echo "Rp " . number_format($Permintaan->subtotal,0,',','.'); ?>">
                    </div>
                    <div class="form-group">
                        <form>
                            <div class="row">
                                <div class="col">
                                <label for="">Jumlah Kirim</label>
                                <input type="text" class="form-control" value="{{$Permintaan->dikirim}}">
                                </div>
                                <div class="col">
                                <label for="">Jumlah Terima</label>
                                <input type="text" class="form-control" value="{{$Permintaan->diterima}}">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Sisa</label>
                        <input type="text" class="form-control" value="{{$Permintaan->sisa}}">
                    </div>
                </div>
                @endforeach
              <div class="d-flex justify-content-end">
                <div class="form-group mr-5 pt-3">
                    <a href="/permintaan/" class="btn btn-primary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>
            </div>
        </div>
    </div>
   </div>
</div>
@endsection

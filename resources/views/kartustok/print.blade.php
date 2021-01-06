@extends('layouts.admin')

@section('content_admin')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Input Products -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Print File</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center pt-3">
                                <h3><b>KARTU STOK TEKNO</b></h3>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="p-2"><b>Nama Barang : {{$prints[0]->nama}}</b></div>
                        <div class="ml-auto p-2 pr-3"><b>Tanggal Print : @php echo date('d-m-Y'); @endphp</b></div>
                    </div>
                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th scope="col">Kode Permintaan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Kode Produk</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Keluar</th>
                                <th scope="col">Masuk</th>
                                <th scope="col">Saldo</th>
                            </tr>
                        </thead>
                        {{-- @foreach($permintaans as $key => $permintaan) --}}
                        @foreach ($KartuStok as $Kartu)
                        <tbody>
                            <tr>
                                <td>{{$Kartu->kode_product}}</td>
                                <td>@php echo date("d-m-Y", strtotime($Kartu->tanggal)); @endphp</td>
                                <td>{{$Kartu->kode_transaksi}}</td>
                                <td>{{$Kartu->keterangan}}</td>
                                <td>{{$Kartu->masuk}}</td>
                                <td>{{$Kartu->keluar}}</td>
                                <td>{{$Kartu->saldo}}</td>
                            </tr>
                        </tbody>
                        @endforeach
                        {{-- @endforeach --}}
                    </table>
                    <div class="form-group">
                        <div class="d-flex">
                            <div class="p-2"><a href="{{url('/Pag4/KartuStok')}}" class="btn btn-primary"><i class="fas fa-times"></i> Batal</a></div>
                            <div class="p-2"><a href="/Pag4/pegawai/cetak_pdf/{{$prints[0]->kode}}" class="btn btn-primary" target="_blank"><i class="fas fa-print"></i> Print</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
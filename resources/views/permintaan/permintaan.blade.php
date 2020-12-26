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
        <div class="col-lg-6 mb-4">
            <!-- Input Products -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="mr-auto">
                    </div>
                    <div class="d-flex">
                        <div class="mr-auto pt-2">
                            <h6 class="m-0 font-weight-bold text-primary">Permintaan Transaksi</h6>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target=".supplier" title="Pilih Supplier"><i class="fas fa-list"></i></button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{url('s_permintaan')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="">Kode Permintaan</label>
                                    @foreach($penggabungans as $penggabungan)
                                    <input type="text" name="" class="form-control"
                                        value="{{$penggabungan}}">
                                    @endforeach
                                </div>
                                <div class="col-md-6">
                                    <label for="">Tanggal Permintaan</label>
                                    <input type="text" name="" id="" class="form-control"
                                        value="@php echo date("Y/m/d") @endphp">
                                </div>
                            </div>
                        </div>
                        @empty($supplierdata)
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <label for="">Nama Supplier</label>
                                    <input type="text" name="" id="" class="form-control" value="">
                                    <div id="searchsupplier"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Kode Supplier</label>
                            <input type="text" name="" id="" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="" id="" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="">PIC</label>
                            <input type="text" name="" id="" class="form-control" value="">
                        </div>
                        @else
                        @foreach ($DataSuppliers as $DatSup)
                        <div class="form-group">
                            <label for="">Nama Supplier</label>
                            <input type="text" name="" id="" class="form-control" value="{{$DatSup->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="">Kode Supplier</label>
                            <input type="text" name="" id="" class="form-control" value="{{$DatSup->kode}}">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="" id="" class="form-control" value="{{$DatSup->alamat}}">
                        </div>
                        <div class="form-group">
                            <label for="">PIC</label>
                            <input type="text" name="" id="" class="form-control" value="{{$DatSup->pic}}">
                        </div>
                        @endforeach
                        @endempty
                </div>
            </div>
        </div>
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="d-flex">
                        <div class="mr-auto p-2">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Permintaan</h6>
                        </div>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target=".bd-example-modal-lg"><i class="fas fa-list"></i></button>
                    </div>
                </div>

                {{-- Daftar Permintaan  --}}
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Tipe</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <?php $no = 0;?>
                        @empty($DataProducts)
                        <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                        @else
                        @foreach($DataProducts as $product_result)
                        <tbody>
                            <tr class="txtMult">
                                <?php $no++ ;?>
                                <th scope="row">{{ $no }}</th>
                                <td>{{$product_result[0]->nama}}<input type="hidden" name="product_id[]" value="{{$product_result[0]->id}}"></td>
                                <td>
                                    {{$product_result[0]->kode}}
                                    @foreach($penggabungans as $penggabungan)
                                    <input type="hidden" name="kodepermintaan[]" value="{{$penggabungan}}">
                                    <input type="hidden" name="tglpermintaan[]"  value="@php echo date("Y/m/d") @endphp">
                                    <input type="hidden" name="supplier_id[]" value="{{$DatSup->id}}">
                                    @endforeach
                                </td>
                                <td></td>
                                <td style="width: 10%;"><input type="type" name="qty[]" class="qty form-control"
                                        ></td>
                                <td style="width: 30%;">Rp @php echo number_format($product_result[0]->harga,
                                    0, ".", ","); @endphp<input type="hidden" name="harga[]"
                                        value="{{$product_result[0]->harga}}" class="harga form-control"></td>
                                {{-- <td><input type="text" id="total" name="total" style="width: 30%;"
                                        class="total form-control" value="">
                                    <span class="total">0.00</span></td> --}}
                                <td>
                                    Rp <span class="multTotal">@php echo number_format($product_result[0]->harga,
                                        0, ".", ","); @endphp</span>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                        @endempty

                    </table>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> SIMPAN</button>
                    </form>
                    <form action="{{url('hapussementara')}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary ml-3"><i
                                class="fas fa-redo-alt"></i> HAPUS</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
        {{-- Popup Supplier Data  --}}
        <div class="modal fade supplier" id="exampleSupplier" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Data Supplier</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('permintaan.store')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Kota</th>
                                        <th scope="col">Bantuan</th>
                                    </tr>
                                </thead>
                                @foreach ($ListSuppliers as $DatSup)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{$DatSup->kode}}</th>
                                        <td>{{$DatSup->nama}}</td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="idsupplier"
                                                    value="{{$DatSup->id}}">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Pilih</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Popup Daftar Produk --}}
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Daftar Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{url('permintaan_post')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Stok</th>
                                    </tr>
                                </thead>
                                @if(!$products->isEmpty())
                                @foreach($products as $product)
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" name="check[]" type="checkbox"
                                                    value="{{$product->id}}">
                                            </div>
                                        </td>
                                        <td><input type="hidden" name="product_id">{{$product->nama}}</td>
                                        <td>
                                            {{$product->kode}}
                                        </td>
                                        <td>{{$product->harga}}</td>
                                        <td>{{$product->status}}</td>
                                        <td>{{$product->stok}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @endif
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Autocomplete  --}}
        {{-- <script type="text/javascript">
            $(document).ready(function () {
                $("#qty, #harga").keyup(function () {
                    var qty = $("#qty").val();
                    var harga = $("#harga").val();

                    var total = parseInt(qty) * parseInt(harga);
                    $("#total").val(total);
                });
            });
        </script> --}}
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.7.2.js" integrity="sha256-FxfqH96M63WENBok78hchTCDxmChGFlo+/lFIPcZPeI="
    crossorigin="anonymous">
</script>
<script>
    $(document).ready(function () {
        $(".txtMult input").keyup(multInputs);

        function multInputs() {
            var mult = 0;
            // for each row:
            $("tr.txtMult").each(function () {
                // get the values from this row:
                var $qty = $('.qty', this).val();
                var $harga = $('.harga', this).val();
                var $total = ($qty * 1) * ($harga * 1)
                $('.multTotal', this).text(rubah($total));
                mult += $total;
            });

            $("#grandTotal").text(mult);
        }

        function rubah(angka) {
            var reverse = angka.toString().split('').reverse().join(''),
                ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return ribuan;
        }
    });
</script>
@endsection
@extends('layouts.admin')

@section('content_admin')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

    </div>

    <div class="flash-message">
        @if( Session::has("success") )
        <div class="alert alert-success alert-block" role="alert">
            <button class="close" data-dismiss="alert"></button>
            {{ Session::get("success") }}
        </div>
        @endif
    </div>
    <span class="success" style="color:green; margin-top:10px; margin-bottom: 10px;"></span>
    <form id="formsubmit">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <!-- Input Products -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="mr-auto">
                        </div>
                        <div class="d-flex">
                            <div class="mr-auto pt-2">
                                <h6 class="m-0 font-weight-bold text-primary">Invoice</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">No Invoice</label>
                            @foreach ($kode as $kode_id)
                            <input type="text" name="kode" id="kode"
                                value="@php echo substr(date('Y'),2).'-T'.date('m').'/'.sprintf('%04d', $kode_id);  @endphp"
                                class="kode form-control">
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" value="@php echo date("Y-m-d") @endphp">
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea class="form-control" cols="30" rows="2" name="keterangan" id="keterangan"
                                autocomplete="off"></textarea>
                        </div>
                        <small><div class="alert-message" id="keterangan_error" style="color:red;"></div></small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <!-- Input Products -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="mr-auto">
                        </div>
                        <div class="d-flex">
                            <div class="mr-auto pt-2">
                                <h6 class="m-0 font-weight-bold text-primary">Detail Pemesan</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama Pemesan</label>
                            <input type="text" name="namatoko" id="namatoko" class="form-control" value=""
                                autocomplete="off">
                        </div>
                        <small><div class="alert-message" id="namatoko_error" style="padding-bottom: 20px; color:red;"></div></small>
                        <div class="form-group">
                            <label for="">No Telepon</label>
                            <input type="text" name="telepon" id="telepon" class="form-control" value=""
                                autocomplete="off">
                        </div>
                        <small><div class="alert-message" id="telepon_error"  style="color:red;"></div></small>
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
                                data-target="#exampleModalScrollable">
                                <i class="far fa-folder-open"></i>
                            </button>
                        </div>
                    </div>
                    {{-- Daftar Permintaan  --}}
                    <div class="card-body">
                        <table class="table" id="DataTabel">
                            <thead>
                                <tr>
                                    <th scope="col">Kode Barang</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jumlah Barang</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            @foreach ($hasil as $hsl)
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="pt-1">{{$hsl[0]->kode}}</div>
                                    </td>
                                    <td>
                                        <div class="pt-1">{{$hsl[0]->nama}}</div>
                                        <input type="hidden" name="idprod[]" value="{{$hsl[0]->id}}">
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-sm pt-1">
                                                Rp
                                            </div>
                                            <div class="col-sm-10">
                                                <input type="text" name="harga[]" value="{{$hsl[0]->harga}}"
                                                    class="price form-control"
                                                    style="border: none; margin-left: -30px;">
                                            </div>
                                        </div>
                                    </td>
                                    <td><input type="number" id="qty[]" name="qty[]" class="qty form-control"
                                            placeholder="Jumlah Barang" max="{{$hsl[0]->stok}}" autocomplete="off" min="1" max="{{$hsl[0]->stok}}">
                                    </td>
                                    <td><span id="stock" class="stock">{{$hsl[0]->stok}}</span></td>
                                    <td>Rp <span id="total_price" name="total_price[]" class="total_price">Rp. 0</span>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                        <div class="d-flex justify-content-end" style="margin-right: 10%">
                            <p><b>Harga Total : Rp <span id="total" class="total">0</span></b></p>
                        </div>
                        <div class="d-flex justify-content-end pt-4">
                            <button id="submit" class="btn btn-primary"><i class="fas fa-save"></i> SIMPAN</button>
                            <a href="{{url('Pag6/DeleteInvoiceHistory')}}" type="button" class="btn btn-primary"
                                style="margin-left: 20px;"><i class="fas fa-trash-alt"></i> HAPUS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document" style="width:100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Pilih Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('Invoice.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Pilih</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Harga</th>
                            </tr>
                        </thead>
                        @foreach ($products as $product)
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="checkbox"
                                            name="product_id[]" value="{{$product->id}}">
                                        <input type="hidden" name="productkode[]" value="{{$product->kode}}">
                                    </div>
                                </th>
                                <td>{{$product->nama}}</td>
                                <td>{{$product->stok}}</td>
                                <td>{{$product->kode}}</td>
                                <td>@php
                                    echo "Rp " . number_format($product->harga,0,',','.');
                                    @endphp</td>
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
{{-- Menghitung pengurangan  --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    // Validasi inputan 
    // $(document).ready(function() {
    //     $("#formsubmit").validate({
    //         rules: {
    //             keterangan: {
    //                 required: true,
    //                 lettersonly: true
    //             },
    //             namatoko: {
    //                 required: true
    //             },
    //             telepon: {
    //                 required: true,
    //                 email: true
    //             },
    //             qty: {
    //                 required: true,
    //                 number: true,
    //                 minlength: 10,
    //                 maxlength: 10
    //             }
    //         },
    //         // Specify the validation error messages
    //         messages: {
    //             keterangan: {
    //                 required: "*Data Keterangan Tolong Isi"
    //             },
    //             namatoko: {
    //                 required: '*Data Nama Toko Tolong Isi'
    //             },
    //             telepon: {
    //                 required: '*Data Telepon Tolong Isi'
    //             },
    //             qty: {
    //                 required: '*Data Jumlah Tolong Isi'
    //             }
    //         }
    //     });
    // });

    var qty;
    var arr;
    var SubTotal;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        perhitungan();
        $('.price').on('change', function () {
            perhitungan();
        })
        $('.qty').on('change', function () {
            perhitungan();
        })

        function perhitungan() {
            var sum = 0;
            $('#DataTabel > tbody > tr').each(function () {
                var price = $(this).find('.price').val();
                qty = $(this).find('.qty').val();

                var total = (price * qty);

                $(this).find('.total_price').text(total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g,
                    "$1."));

                sum += total;

                $(this).find('amount').text(+total);
            })

            // Mengambil nilai grand total 
            SubTotal = sum;

            $('.total').text(sum.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
        }

    })

    $("#formsubmit").on('submit', function (event) {
        event.preventDefault();

        let kodes = $('#kode').val();
        let tanggal = $('#tanggal').val();
        let Keterangan = $('#keterangan').val();
        let namatoko = $('#namatoko').val();
        let telepon = $('#telepon').val();
        let sub_total = SubTotal;

        // Mengambil data untuk tabel invoice_detail 

        let product_id = $("input[name='idprod[]']").map(function () {
            return $(this).val();
        }).get();
        let qty = $("input[name='qty[]']").map(function () {
            return $(this).val();
        }).get();
        let harga = $("input[name='harga[]']").map(function () {
            return $(this).val();
        }).get();
        let productkode = $("input[name='productkode[]']").map(function () {
            return $(this).val();
        }).get();

        $.ajax({
            url: '/Pag6/InvoiceTemp',
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                kode: kodes,
                tanggal: tanggal,
                keterangan: Keterangan,
                sub_total: sub_total,
                product_id: product_id,
                qty: qty,
                namatoko: namatoko,
                telepon: telepon,
                productkode: productkode,
                harga: harga,
            },
            success: function (response) {
                window.location = response.url;
                $('div.flash-message').html(data);
                $('.success').text(response.success);
            },
            error: function(response) {
              $('#keterangan_error').text(response.responseJSON.errors.keterangan);
              $('#telepon_error').text(response.responseJSON.errors.telepon);
              $('#namatoko_error').text(response.responseJSON.errors.namatoko);
           }
        });
    });
</script>
@endsection
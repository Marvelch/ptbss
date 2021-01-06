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

            <form id="formsubmit">
                <!-- Input Products -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Cek Penerimaan</h6>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Kode Supplier</label>
                                    <input type="text" name="kodesupplier" id="kodesupplier" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Pilih Supplier</label>
                                    <select name="select1" id="select1" class="form-control">
                                        <option value="">Pilih...</option>
                                        @foreach ($Suppliers as $Supplier)
                                        <option value="{{$Supplier->id}}" id="{{$Supplier->id}}">{{$Supplier->nama}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" cols="30" rows="2" class="form-control"
                                        value=""></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control"
                                        value=""></textarea>
                                </div>
                            </div>

                            <div class="col-md-1">
                                {{-- kosong --}}
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">No PRO</label>
                                    {{-- No Pro Otomatis --}}
                                    @foreach ($Kode as $Kode_auto)
                                        <input type="text" name="" id="no_rpo" class="form-control" value="@php echo 'RPT/'.substr(date('Y'),2).date('m').sprintf('%04d', $Kode_auto);  @endphp">
                                    @endforeach
                                    
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal</label>
                                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="@php echo  date('Y-m-d') @endphp">
                                </div>
                                <div class="form-group">
                                    <label for="">No Sales Order (SO)</label>
                                    <input type="text" name="" id="no_so" autocomplete="off" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">No Delivery Order (DO)</label>
                                    <input type="text" name="" id="no_do" autocomplete="off"     class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">No Permintaan</label>
                                    <select name="nopermintaan" id="select2" name="select2" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($Permintaans->unique('kodepermintaan') as $Permintaan)
                                        <option value="{{$Permintaan->kodepermintaan}}"
                                            id="{{$Permintaan->supplier_id}}">{{$Permintaan->kodepermintaan}}
                                        @endforeach
                                    </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table class="table" id="userTable">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kode Permintaan</th>
                                            <th scope="col">Nama Produk</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Jumlah Permintaan</th>
                                            <th scope="col">Diterima</th>
                                            <th scope="col">Sisa</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                               <div class="col-md-2">
                                   <label for="">Total</label>
                                <input id="grand_total" disabled="" class="form-control">
                               </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="p-2">
                            <div class="form-group">
                                <button id="submit" class="btn btn-primary mr-3">Terima Permintaan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript">

    var kodepermintaan;
    var tglpermintaan;
    var jumlah;
    var supplier_id;
    var diterima;
    var jmlh_kirim;
    var num = 0;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#select1").change(function () {
        if ($(this).data('options') == undefined) {
            
            $(this).data('options', $('#select2 option').clone());
        }
        var id = $(this).val();
        var options = $(this).data('options').filter('[id=' + id + ']');
        $('#select2').html(options);
    });

    $('#select2').on('click',function()
    {
        var nilai = $(this).find('option').filter(':selected').val();
    })

    $('#select2').click(function () {
        var tid = $(this).find('option').filter(':selected').val();
        
        $.ajax({
            url: 'getPermintaanData/'+tid,
            type: 'get',
            dataType: 'json',
            success: function (response) {
                var len = 0;
                $('#userTable tbody').empty(); 
                if (response[0]['data'] != null) {
                    len = response[0]['data'].length;
                }
                if (len > 0) {
                    for (var i = 0; i < len; i++) {
                        var id = response[0]['data'][i].id;
                        kodepermintaan = response[0]['data'][i].kodepermintaan;
                        tglpermintaan = response[0]['data'][i].tglpermintaan;
                        jumlah = response[0]['data'][i].jumlah;
                        kodeproduct = response[1][i]['ex'][0].kode;
                        idproducts = response[1][i]['ex'][0].id;
                        nama_product = response[1][i]['ex'][0].nama;
                        supplier_id = response[0]['data'][i].supplier_id;
                        // nama = response[0]['data'][i].nama;
                        var tr_str = "<tr>" +
                            "<td>" + (i + 1) + "</td>" +
                            "<td>" + kodepermintaan + "</td>" +
                            "<td>" + nama_product + "<input type='hidden' name='kodeproduct[]' value='"+kodeproduct+"'></input><input type='hidden' name='idproducts[]' value='"+idproducts+"'></input></td>" +
                            "<td>" + tglpermintaan + "</td>" +
                            "<td>" + jumlah + "</td>" +
                            "<td><input type='text' autocomplete='off' name='diterima[]' id='diterima[]' class='diterima form-control'></td>" +
                            "<td><input type='text' id='sisa[]' name='sisa"+ i +"' class='sisa form-control' disabled=''></td>" +
                            "</tr>";
                        $("#userTable tbody").append(tr_str);
                    }
                } else if (response['data'] != null) {
                    var tr_str = "<tr>" +
                        "<td align='center'>1</td>" +
                        "<td align='center'>" + response['data'].kodepermintaan + "</td>" +
                        "<td align='center'>" + response['data'].tglpermintaan + "</td>" +
                        "<td align='center'>" + response['data'].tglpermintaan + "</td>" +
                        "</tr>";
                    $("#userTable tbody").append(tr_str);
                } else {
                    var tr_str = "<tr>" +
                        "<td align='center' colspan='4'>No record found.</td>" +
                        "</tr>";
                    $("#userTable tbody").append(tr_str);
                }
            }
        });
    });

    $('#select1').on('change', function () {
        var Nilai = $(this).val();

        var request = $.get('/channels/fetch/' + Nilai);

        request.done(function (response) {
            $('#kodesupplier').val(response[0].kode);
            $('textarea[name=alamat]').val(response[0].alamat);
        });
    });

    // Perhitungan jumlah sisa dan total 
    // var i = 0;
    
    $('#select2').on('change',function(){
        $(document).change(function(){
            $('input[name^="diterima[]"]').on('change keyup',function(){
            var tr              = $(this).closest('tr'), 
                jmlh_kirim      = $('#userTable tr').map(function(){return $(this).find("td:eq(4)").html()}).get(),
                diterima        = $('input[name^="diterima[]"]').map(function(){return $(this).val();}).get(),
                grand_total     = $('#grand_total');

                // Cara mengambil data dari jumlah permintaan
                for(i=0; i < diterima.length;i++)
                {
                    $('input[name^="sisa'+[i]+'"]').val(jmlh_kirim[i] - diterima[i]);
                }

                // Menantukan Grand Total 
                var grandTotal = 0;

                $('table').find('input.sisa').each(function(){
                    if(!isNaN($(this).val()))
                        {grandTotal += parseInt($(this).val());
                    }
                });

                if(isNaN(grandTotal))
                grandTotal = 0;
                grand_total.val(grandTotal);
            })
        })
    })

    $("#formsubmit").on('submit', function (event) {
        event.preventDefault();

        let diterima         = $('input[name^="diterima[]"]').map(function(){return $(this).val();}).get();
        // let diterima        = $('input[name^="diterima[]"]').map(function(){return $(this).val();}).get();
        let jumlahs         = $('#userTable tr').find("td:eq(4)").text(); //Mengambil Nilai Permintaan
        let status          = $('#status').find('option').filter(':selected').val();
        let no_rpo          = $('#no_rpo').val();
        let tanggal         = $('#tanggal').val();
        let no_so           = $('#no_so').val();
        let no_do           = $('#no_do').val();
        let kodepermintaan  = $('#select2').find('option').filter(':selected').val(); 

        let sisabarang      = $('input[id^="sisa[]"]').map(function(){return $(this).val();}).get();
        let idproducts      = $('input[name^="idproducts[]"]').map(function(){return $(this).val();}).get();
        let keterangan      = $('#keterangan').val();
        let kodeproduct     = $('input[name^="kodeproduct[]"]').map(function(){return $(this).val();}).get();

        $.ajax({
            url: '/Pag3/Penerimaan',
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                status: status,
                no_rpo: no_rpo,
                tanggal: tanggal,
                no_so: no_so,
                no_do: no_do,
                jumlah: sisabarang,
                kodeproduct: kodeproduct,
                kodepermintaan: kodepermintaan,
                diterima:diterima,
                idproducts: idproducts,
                keterangan: keterangan,
            },
            success: function(res){
                window.location=res.url;
            }
        });
    });

</script>
@endsection
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>PRINT</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 12px;
        line-height: 20px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #333;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        /* text-align: right; */
    }
    
    .invoice-box table tr.top table td {
        border: 5px;
        border-color: black;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid rgb(0, 0, 0);
        font-weight: bold;
        border: 1px solid rgb(136, 136, 136);
        text-align: center;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 12px;
        border: 1px solid rgb(136, 136, 136);
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid rgb(0, 0, 0);
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: 10px;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid rgb(0, 0, 0);
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    .txt-center{
        /* text-center: center; */
        text-align: center;
    }
    .font-small{
        font-size: 13px;
    }

    .EachData{
        position: absolute;
        left: 20%;
    }
    
    </style>
</head>

<body>
    <div class="txt-center">
        <h2>LAPORAN PERMINTAAN</h2>
        <p class="font-small" style="margin-top: -15px;">
            Jalan Perumnas No.1 Malaka Sari Duren Sawit<br>
            Jakarta Timur - 13460 <br>
            Hunting : 021-8603860
        </p>
    </div>
    <hr>
    <h3 class="txt-center">PERMINTAAN</h3>
    <div class="invoice-box">
        <div class="form-header">
            <p>No Permintaan : <span class="EachData">: {{$KodePermintaan}}</span></p>
            <p>Tanggal<span class="EachData">: @php echo date('d/m/Y');@endphp </span></p>
            @foreach ($Suppliers as $SupplierID)
            <p>Data Supplier<span class="EachData">: {{$SupplierID->kode}} - {{$SupplierID->nama}}</span></p>
            @endforeach
            @foreach ($GetSupplier as $Supplier)
            <p>Kepada <span class="EachData" style="width: 40%">: {{$Supplier->alamat}}</span></p>
            @endforeach
        </div>    
        {{-- <p style="padding-top: 30px;">Bersama ini kami sampaikan barang :</p>     --}}
        <table cellpadding="0" cellspacing="0" style="padding-top: 30px;">
                <tr class="heading">
                    <td>Kode Permintaan</td>
                    <td>Nama Barang</td>
                    <td>Tanggal</td>
                    <td>Jumlah</td>
                    <td>Harga</td>
                    <td>Total</td>
                </tr>
                
                @foreach ($PermintaanData as $Data)
                <tr class="details">
                    <td>{{$Data->product->kode}}</td>
                    <td style="width: 30%;">{{$Data->product->nama}}</td>
                    <td>@php echo date('d/m/Y', strtotime($Data->tglpermintaan)); @endphp</td>
                    <td>{{$Data->jumlah}}</td>
                    <td>@php echo "Rp " . number_format($Data->harga,0,',','.')  @endphp</td>
                    <td>@php echo "Rp " . number_format($Data->subtotal,0,',','.')  @endphp</td>
                </tr>
                @endforeach
        </table>
        <p>
            <span style="margin-left: 55%;">
               <b> Total :  {{$Total}}</b>
            </span>
            <hr>
            <span style="margin-left: 73%;">
                <b> Grand Total : @php echo "Rp " . number_format($GrandTotals,0,',','.')  @endphp</b>
             </span>
        </p>
        <p>Keterangan :</p>
        <div style="width: 50%;">
            <textarea name="" id="" cols="30" rows="10"></textarea>
        </div>
        <table cellpadding="0" cellspacing="0">
            {{-- <td style="padding-left: 55%;"><u><b> Grand Total</b></u> <span><b style="margin-left: 10%;"> {{$total}}</b></span><span><b style="margin-left: 35;"> {{$keluar}}</b></span></td> --}}
        </table>
        <hr style="margin-top: 7%;">
        <hr>
        <div style="float : left; padding-left: 10%;">
            <p>Yang Membuat,</p>

            <p style="margin-top: 25%">
                ( ___________ )
            </p>
        </div>
        <div style="float : right; padding-right: 10%;">
            <p style="padding-left: 7px;">Menyetujui,</p>

            <p style="margin-top: 25%">
                ( ___________ )
            </p>
        </div>
    </div>
</body>
</html>
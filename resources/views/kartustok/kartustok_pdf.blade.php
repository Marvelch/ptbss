<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>PRINT</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 12px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
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
        padding-bottom: 20px;
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
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
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
        text-center: center;
    }
    </style>
</head>

<body>
    <div class="text-center">
        <h3>KARTU STOK TEKNO</h3>
    </div>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr> 
                            <td>Nama Barang : 
                                @foreach ($results as $result)
                                    {{$result->nama}}
                                @endforeach
                             </td>                     
                            <td style="text-align: right;">Tanggal Print : 
                               @php
                                   echo date('d-m-Y');
                               @endphp
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table cellpadding="0" cellspacing="0">
            
                <tr class="heading">
                    <td>Kode Barang</td>
                    <td>Tanggal</td>
                    <td>Transaksi</td>
                    <td>Keterangan</td>
                    <td>Masuk</td>
                    <td>Keluar</td>
                    <td>Saldo</td>
                </tr>
                @foreach ($permintaans as $permintaan)
                <tr class="details">
                    @foreach ($results as $result)
                    <td>
                        {{$result->kode}}
                    </td>
                    @endforeach
                    <td>
                        @php
                           echo date('d-m-Y', strtotime($permintaan->tglpermintaan)); 
                        @endphp 
                    </td>
                    <td>
                        {{$permintaan->kodepermintaan}}
                    </td>
                    <td>
                        Keterangan
                    </td>
                    <td>
                        {{$permintaan->jumlah}}
                    </td>
                    <td>
                        Keluar
                    </td>
                    <td>
                        {{$result->stok}}
                    </td>
                </tr>
                @endforeach
        </table>
        <table cellpadding="0" cellspacing="0">
            <td style="padding-left: 50%;"><u><b>Grand Total</b></u> <span><b style="margin-left: 16%;">{{$hasils}}</b></span></td>
        </table>
    </div>
</body>
</html>
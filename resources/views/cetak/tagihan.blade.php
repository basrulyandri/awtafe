<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>PDF</title>
    
    <style>
    
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }
    
    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }
    
    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }
    
    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }
    
    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }
    
    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }
    
    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }
    
    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
    
    .invoice-box table tr.total td{
        border-top:2px solid #eee;
        font-weight:bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }
        
        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{url('assets/uploads')}}/LOGO-invoice.png" style="width:60%; max-width:300px;">
                            </td>
                            
                            <td>
                                NO.Tagihan: {{$tagihan->no}}<br>
                                Dibuat pada: {{$tagihan->created_at->format('d F Y')}}<br>                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                {{PTName()}}<br>
                                {{PTAlamat()}}<br>
                                {{PTTelepon()}}
                            </td>
                            
                            <td>
                                Kepada<br>
                                {{$tagihan->mahasiswa->nama}}<br>
                                {{$tagihan->mahasiswa->email}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>Nama</td>                
                <td>JUMLAH</td>
            </tr>            
              <tr class="item">
                  <td>{{$tagihan->biaya->nama}}</td>
                  <td>Rp. {{number_format( $tagihan->nominal , 0 , '.' , '.' ) }}</td>
              </tr>            
            <tr class="total">
                <td style="text-align: right;">Total: </td>
                
                <td>
                  Rp. {{number_format( $tagihan->nominal , 0 , '.' , '.' ) }}
                </td>
            </tr>
        </table>
    </div>         
</body>
</html>

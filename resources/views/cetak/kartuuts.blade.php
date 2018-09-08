<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Kartu Ujian Tengah Semester</title>
    
    <style>
     @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
    .invoice-box{
        max-width:1100px;
        margin:auto;
        padding:30px;
        
        font-size:12px;
        line-height:14px;
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

    #headingTitle{
        line-height: 12px;
    }

    #headingTitle td{
        padding-bottom: 5px;
    }

    .bordered td{
        border: 1px solid #ddd;
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

<body onload="window.print()">
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                
                <td colspan="6" width="100%">
                    <img src="{{url('assets/dist/img')}}/header-kartu-UTS.jpg" style="width:100%;">                                                            
                </td>
                   
            </tr>
            
            <tr class="information">
                <td colspan="6">
                    <table id="headingTitle">
                        <tr>
                            <td>
                                <table>
                                    <tr>                      
                                        <td>NIM</td><td>:</td> <td>{{$krs->mahasiswa->NIM}}</td>
                                    </tr>
                                    <tr>                      
                                        <td>NAMA</td><td>:</td> <td>{{$krs->mahasiswa->nama}}</td>
                                    </tr>
                                    <tr>
                                        <td>PROGRAM STUDI</td><td>:</td><td> {{$krs->mahasiswa->konsentrasi->nama}}</td>
                                    </tr>
                                </table> 
                            </td>

                            <td>
                                 <table>
                                    <tr>                      
                                        <td>TAHUN AKADEMIK</td><td>:</td> <td>{{$krs->tahunakademik->nama}}</td>
                                    </tr>
                                    <tr>                      
                                        <td>SEMESTER</td><td>:</td> <td>{{$krs->semester}}</td>
                                    </tr>
                                    <tr>
                                        <td>No. KARTU</td><td>:</td><td>{{$krs->no_uts}}</td>
                                    </tr>
                                   
                                </table> 
                            </td>
                        </tr>
                    </table>                   
                </td>
            </tr>
            
            <tr class="heading">
                <td>KODE MK</td>
                <td>MATA KULIAH</td>
                <td>TTD PENGAWAS</td>                                
            </tr>            
            @foreach($krs->jadwalkuliah as $jadwal)
                <tr class="bordered">
                  <td>{{$jadwal->matakuliah->kode}}</td>
                  <td>{{$jadwal->matakuliah->nama}}</td>
                  <td style="height:25px;"></td>
                </tr>
            @endforeach            
            
            <tr class="total">
            
            </tr>
        </table>
    </div>         
</body>
</html>

<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Absensi</title>
    
    <style>
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
    body{
        margin:40px auto;
    }
    .invoice-box{
        max-width:1100px;
        margin:auto;
        padding:30px;
        border:0px solid #eee;
        //box-shadow:0 0 10px rgba(0, 0, 0, .15);
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

    .invoice-box table td.ttd{
        width:15px;
        border: 1px solid #8c8c8c;
        text-align:center;
        padding:0;
    }

    #headingTitle{
        line-height: 12px;
    }

    #headingTitle td{
        padding-bottom: 5px;
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
                
                <td colspan="16" width="100%">
                    <img src="{{url('assets/dist/img')}}/header-absensi.jpg" style="width:100%;">                                                            
                </td>
                   
            </tr>
            
            <tr class="information">
                <td colspan="16">
                    <table id="headingTitle">
                        <tr>
                            <td>
                                <table>
                                    <tr>                      
                                        <td>MATA KULIAH</td><td>:</td> <td>{{$jadwal->matakuliah->nama}}</td>
                                    </tr>
                                    <tr>                      
                                        <td>NAMA</td><td>:</td> <td>{{$jadwal->dosen->nama_lengkap}}</td>
                                    </tr>
                                    <tr>
                                        <td>SEMESTER</td><td>:</td><td> {{$jadwal->semester}}</td>
                                    </tr>
                                </table> 
                            </td>

                            <td>
                                 <table>
                                    <tr>                      
                                        <td>TAHUN AKADEMIK</td><td>:</td> <td>{{$jadwal->tahunakademik->nama}}</td>
                                    </tr>
                                    <tr>                      
                                        <td>WAKTU</td><td>:</td> <td>{{$jadwal->hari}}, {{$jadwal->jam_mulai}} s.d {{$jadwal->jam_selesai}}</td>
                                    </tr>
                                   
                                </table> 
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td class="ttd">NO</td>
                <td style="border: 1px solid #8c8c8c;">NAMA</td>
                <td class="ttd">1</td>
                <td class="ttd">2</td>
                <td class="ttd">3</td>
                <td class="ttd">4</td>
                <td class="ttd">5</td>
                <td class="ttd">6</td>
                <td class="ttd">7</td>
                <td class="ttd">8</td>
                <td class="ttd">9</td>
                <td class="ttd">10</td>
                <td class="ttd">11</td>
                <td class="ttd">12</td>
                <td class="ttd">13</td>                
                <td class="ttd">14</td>                
            </tr>   
            <?php $no = 1;?>         
            @foreach($jadwal->krs as $krs)
                <tr>
                  <td class="ttd">{{$no}}</td>
                  <td style="border: 1px solid #8c8c8c;">{{$krs->mahasiswa->nama_depan}} {{$krs->mahasiswa->nama_belakang}}</td>
                  <td class="ttd"></td>
                  <td class="ttd"></td>
                  <td class="ttd"></td>
                  <td class="ttd"></td>
                  <td class="ttd"></td>
                  <td class="ttd"></td>
                  <td class="ttd"></td>
                  <td class="ttd"></td>
                  <td class="ttd"></td>
                  <td class="ttd"></td>
                  <td class="ttd"></td>
                  <td class="ttd"></td>
                  <td class="ttd"></td>
                  <td class="ttd"></td>
                </tr>
                <?php $no++;?>
            @endforeach            
        </table>            
       
    </div>         
</body>
</html>

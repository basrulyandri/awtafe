@extends('layouts.backend.main')
@section('header')
  <link rel="stylesheet" href="{!!url('assets')!!}/dist/css/autocomplete.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
@endsection
@section('title')
  Detail Mahasiswa
@stop

@section('content')
  <section class="content-header">
    <h1>Detail Mahasiswa</h1>
  </section>
  @if($user->mahasiswa->status_mahasiswa_id == 1)
    <div class="pad margin no-print">
      <div class="callout callout-warning" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-warning"></i> Catatan:</h4>
        Untuk melangkah ke tahap selanjutnya silahkan membayar biaya awal, lalu konfirmasi pembayaran pada form yang telah disediakan.
      </div>
    </div>
  @endif

  <section class="content"> 
    <div class="row">
      <div class="col-md-3">
          @include('users._biomahasiswa')
      </div>

      <div class="col-md-9">
        @if($user->mahasiswa->status_mahasiswa_id == 2)
          @include('users._menumahasiswaaktif')
        @endif

        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Histori Tagihan</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="tabelTagihan" class="table table-striped">
              <thead><tr>
                <th style="width: 10px">#</th>
                <th>NO</th>
                <th>BIAYA</th>
                <th>NOMINAL</th>
                <th>TANGGAL</th>
                <th>STATUS</th>  
                <th>ACTION</th>                
              </tr>
              </thead>
              <tbody>
              <?php $no=1;?>
              @foreach($user->mahasiswa->tagihan()->orderBy('created_at','desc')->get() as $tagihan)                
                  <tr>
                    <td>{{$no}}</td>
                    <td>{{$tagihan->no}}</td>
                    <td>{{$tagihan->biaya->nama}}</td>
                    <td class="nominal">{{$tagihan->nominal}}</td>
                    <td>{{$tagihan->created_at->format('d F Y')}}</td>
                    <td class="{{$tagihan->bgStatus()}}">{{$tagihan->status}}</span></td>
                    <td>
                      <a tagihan-id="{{$tagihan->id}}" class="btn btn-sm btn-primary lihatDetailBayarTagihan" data-toggle="modal" href='#detailBayarTagihan'><i class="fa fa-eye"></i> Lihat</a>
                      @if($tagihan->status != 'Lunas')
                        <a tagihan-id="{{$tagihan->id}}" class="btn btn-sm btn-primary konfirmasiPembayaran" data-toggle="modal" href='#konfirmasiPembayaran'><i class="fa fa-money"></i> Bayar</a>
                      @endif
                    </td>
                  </tr>
                  <?php $no++;?>               
              @endforeach
            </tbody></table>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    </div>
  </section>

 
 <div class="modal fade" id="detailBayarTagihan">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         <h4 class="modal-title">Detail Pembayaran</h4>
       </div>
       <div class="modal-body" id="modalDetailBayar">
         
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>        
       </div>
     </div>
   </div>
 </div>

 
 <div class="modal fade" id="konfirmasiPembayaran">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         <h4 class="modal-title">Konfirmasi Pembayaran</h4>
       </div>
       <div id="modalKonfirmasiPembayaran" class="modal-body">
         
       </div>
       <div class="modal-footer">
         
       </div>
     </div>
   </div>
 </div>
@stop

@section('footer')
<script src="{{url('assets/plugins/jquery-priceformat/jquery-priceformat.min.js')}}"></script>
<script src="{{url('assets/plugins/datatables')}}/jquery.dataTables.min.js"></script>
<script src="{{url('assets/plugins/datatables')}}/dataTables.bootstrap.min.js"></script>
 <script>
   $(document).ready(function(){    

    $('.nominal').priceFormat({
      prefix: 'Rp ',
      centsSeparator:',',
      centsLimit:0,
      thousandsSeparator: '.'
       });
    $('body').on('click','a.lihatDetailBayarTagihan',function(){
      var btnLihat = $(this);
      var _token = '{{Session::token()}}';
      var tagihan_id = btnLihat.attr('tagihan-id');
      $.ajax({
          method:'POST',
          url:'{{route('m.lihat.detail.bayar')}}',
          data:{_token:_token,tagihan_id:tagihan_id}    
          }).success(function(data){
             $('#modalDetailBayar').html(data['view']);
             $('.nominal').priceFormat({
                prefix: 'Rp ',
                centsSeparator:',',
                centsLimit:0,
                thousandsSeparator: '.'
                 });
             console.log(data['msg']);
        });
    });
    $('body').on('click','a.konfirmasiPembayaran',function(){
     
        var btnBayar = $(this);
        var tagihan_id = btnBayar.attr('tagihan-id');
        var _token = '{{Session::token()}}';
        $.ajax({
            method:'POST',
            url:'{{route('m.konfirmasi.pembayaran')}}',
            data:{_token:_token,tagihan_id:tagihan_id},
            }).success(function(data){              
              $('#modalKonfirmasiPembayaran').html(data['view']); 
              $('#tglBayar').datepicker({
                dateFormat : 'yy-mm-dd',
                yearRange: "-70:+0",
                changeYear: true,
                changeMonth: true,                
              });
          });
      });

    $('#tabelTagihan').DataTable({
        responsive:true,
        "language": {
            "url": "{{url('assets/plugins/datatables')}}/indonesia.json"
        }        
    });


   });
 </script>
@endsection

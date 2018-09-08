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
            <h3 class="box-title">KHS</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table">
                <tbody><tr>                
                  <th>TAHUN AJARAN</th>
                  <th>SEMESTER</th>
                  <th>SKS</th>                
                  <th>ACTION</th>
                </tr>
                 @foreach($user->mahasiswa->khs()->orderBy('semester')->get() as $khs)
                  <tr class="bg-gray">
                    <td>{{$khs->tahun_akademik}}</td>
                    <td>{{$khs->semester}}</td>
                    <td>{{$khs->jumlahSks()}}</td>
                    <td>       
                      <a target="_blank" class="btn btn-sm btn-primary" href="{{route('khslama.cetak',['khs' => $khs])}}"><i class="fa fa-print"></i> Print</a>
                    </td>
                  </tr>
                  @endforeach
                @foreach($user->mahasiswa->krs()->orderBy('created_at','desc')->get() as $k)
                <tr>
                  <td>{{$k->tahunakademik->nama}}</td>
                  <td>{{$k->semester}}</td>
                  <td>{{$k->jumlahSks()}}</td>
                  @if($user->mahasiswa->isLunasBiayaKuliah($k->tahun_akademik_id,$k->semester))
                    <td>
                      @if($k->isSemuaNilaiSudahMasuk())            
                        <a class="btn btn-primary" krs-id="{{$k->id}}" data-toggle="modal" id="btnLihatKHS" href='#lihatKHS'><i class="fa fa-eye"></i> Lihat</a>
                      @else
                        <span class="text-red">Belum bisa dilihat karena nilai belum masuk semua</span>
                      @endif
                    </td>
                  @else
                  <td>
                    <span class="text-red">Belum bisa dilihat, anda harus melunasi biaya kuliah terlebih dahulu</span>
                    </td>
                  @endif

                </tr>               
                @endforeach
              </tbody></table>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    </div>
  </section>

  
  <div class="modal fade" id="lihatKHS">
    <div class="modal-dialog" style="width:60%">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Detail KHS</h4>
        </div>
        <div class="modal-body">
          <div id="detailKHS" class="modal-body">
        </div>
        <div class="modal-footer" id="footerKHS">          
          
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
    $('body').on('click','#btnLihatKHS',function(){
      
        var krs_id = $(this).attr('krs-id');
        var _token = '{{Session::token()}}';
        $.ajax({
          method:'POST',
          url:'{{route('m.khs.detail')}}',
          data:{_token:_token,krs_id:krs_id}
        }).success(function(data){
          $('#footerKHS').html(data['buttonPrint']);           
          $('div#detailKHS').html(data['view']);          
        });          
      });
   });
 </script>
@endsection

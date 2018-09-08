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
    <!-- @if(!Auth::user()->mahasiswa->isSudahPunyaKrs() AND Auth::user()->mahasiswa->isLunasBiayaGedung() AND Auth::user()->mahasiswa->isMahasiswaPernahIsiKRS() AND Auth::user()->mahasiswa->isBaruAtauPindahan())
      <div class="col-md-12">
        <div class="alert alert-warning">
          <i class="fa fa-warning"></i>  Anda Mahasiswa baru dan belum Isi KRS
          <a href="{{route('jadwal.viewmahasiswa',['tahunakademik' => TASekarang(),'semester'=> semesterG()])}}" class="btn btn-sm btn-primary pull-right">Isi KRS</a>
        </div>
      </div>  
      @endif -->
      
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
                  <th>NO</th>
                  <th>TAHUN AJARAN</th>
                  <th>SEMESTER</th>                  
                  <th>ACTION</th>
                </tr>
                <tr>
                @foreach($user->mahasiswa->krs()->orderBy('created_at','desc')->get() as $k)
                  <td>1.</td>
                  <td>{{$k->tahunakademik->nama}}</td>
                  <td>{{$k->semester}}</td>                  
                  <td>
                    <a target="_blank" href="{{route('jadwal.viewmahasiswa',['tahunakademik'=> $k->tahun_akademik_id,'semester' => ($k->semester % 2 == 0 )? 'genap' : 'ganjil'])}}" class="btn btn-info"><i class="fa fa-eye"></i> Lihat</a>
                    @if($k->no_uts)
                    <a target="_blank" class="btn btn-success" href="{{route('m.cetak.kartu.uts',['nouts' => $k->no_uts])}}"><i class="fa fa-print"></i> Kartu UTS</a>
                    @endif
                    @if($k->no_uas)
                    <a target="_blank" class="btn btn-success" href="{{route('m.cetak.kartu.uas',['nouas' => $k->no_uas])}}"><i class="fa fa-print"></i> Kartu UAS</a>
                    @endif
                  </td>

                @endforeach
                </tr>               
              </tbody></table>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
    </div>
  </section>
 
@stop

@section('footer')
<script src="{{url('assets/plugins/jquery-priceformat/jquery-priceformat.min.js')}}"></script>
<script src="{{url('assets/plugins/datatables')}}/jquery.dataTables.min.js"></script>
<script src="{{url('assets/plugins/datatables')}}/dataTables.bootstrap.min.js"></script>
 <script>
   $(document).ready(function(){        


   });
 </script>
@endsection

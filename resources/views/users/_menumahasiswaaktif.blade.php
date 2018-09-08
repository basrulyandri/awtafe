<div class="box">
  <div class="box-header">
    <h3 class="box-title">Shorcuts</h3>
  </div>
  <div class="box-body">              
    <a href="{{route('myprofile.pembayaran')}}" class="btn btn-app">
      <i class="fa fa-money"></i> Pembayaran
    </a>
    <a href="{{route('myprofile.tagihan')}}" class="btn btn-app">
    @if(Auth::user()->mahasiswa->jumlahTagihanBelumLunas())
      <span class="badge bg-yellow">{{Auth::user()->mahasiswa->jumlahTagihanBelumLunas()}}</span>
    @endif
      <i class="fa fa-file-text-o"></i> Tagihan
    </a>   

    <a href="{{route('myprofile.krs')}}" class="btn btn-app">
      <i class="fa fa-book"></i> KRS
    </a>    
    <a href="{{route('myprofile.khs')}}" class="btn btn-app">
      <i class="fa fa-ticket"></i> KHS
    </a>
               
  </div>
  <!-- /.box-body -->
</div>
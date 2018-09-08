<div class="row">
  <div class="col-sm-3 col-xs-6">
    <div class="description-block border-right">      
      <h5 class="description-header">NO. TAGIHAN</h5>
      <span class="description-text">{{$tagihan->no}}</span>
    </div>
    <!-- /.description-block -->
  </div>
  <!-- /.col -->
  <div class="col-sm-3 col-xs-6">
    <div class="description-block border-right">      
      <h5 class="description-header">BIAYA</h5>
      <span class="description-text">{{$tagihan->biaya->nama}}</span>
    </div>
    <!-- /.description-block -->
  </div>
  <!-- /.col -->
  <div class="col-sm-3 col-xs-6 {{$tagihan->bgStatus()}}">
    <div class="description-block border-right">      
      <h5 class="description-header">STATUS</h5>
      <span class="description-text">{{$tagihan->status}}</span>
    </div>
    <!-- /.description-block -->
  </div>
  <!-- /.col -->
  <div class="col-sm-3 col-xs-6">
    <div class="description-block">     
      <h5 class="description-header">DIBUAT TGL</h5>
      <span class="description-text">{{$tagihan->created_at->format('d F Y')}}</span>
    </div>
    <!-- /.description-block -->
  </div>
</div>
<hr>
<table class="table">
    <tbody><tr>                  
      <th>NO</th>
      <th>TANGGAL BAYAR</th>      
      <th>NOMINAL</th>
    </tr>
    @foreach($tagihan->pembayaran as $bayar)
    <tr>
      <td>1</td>
      <td>{{$bayar->created_at}}</td>
      <td class="nominal">{{$bayar->nominal}}</td>
    </tr>
    @endforeach
    <tr class="bg-gray">
      <td></td>
      <td>JUMLAH</td>      
      <td class="nominal"><strong>{{$tagihan->pembayaran()->sum('nominal')}}</strong></td>
      <td></td>
      <td></td>
      
      
    </tr>
  </tbody>
</table>
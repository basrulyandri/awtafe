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
            <h3 class="box-title">Histori Pembayaran</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <table class="table table-striped">
              <tbody><tr>
                <th style="width: 10px">#</th>
                <th>NO</th>
                <th>BIAYA</th>
                <th>NOMINAL</th>
                <th>TANGGAL</th>                
              </tr>
              <?php $no=1;?>
              @foreach($user->mahasiswa->tagihan()->orderBy('created_at','desc')->get() as $tagihan)
                @foreach($tagihan->pembayaran()->orderBy('created_at','desc')->get() as $pembayaran)
                  <tr>
                    <td>{{$no}}</td>
                    <td>{{$pembayaran->notagihan}}</td>
                    <td>{{$pembayaran->tagihan->biaya->nama}}</td>
                    <td class="nominal">{{$pembayaran->nominal}}</td>
                    <td>{{$pembayaran->created_at->format('d F Y')}}</td>
                    <td><span class="label label-@if($tagihan->status == 'Lunas')success @elseif($tagihan->status == 'Tertagih')warning @endif">{{$pembayaran->status}}</span></td>
                  </tr>
                  <?php $no++;?>
                @endforeach    
              @endforeach
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
 <script>
   $(document).ready(function(){     

      function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex: 1070,
          revert: true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        });

      });
    }

    ini_events($('#external-events div.external-event'));

    $('#drop-potongan-biaya').droppable({
      drop:function(event,ui){
        var potongan_id = ui.draggable.attr('potongan_id');
        $('#drop-potongan-biaya').append(ui.draggable);
        $('#drop-potongan-biaya').append('<input type="hidden" name="potongan_biaya_id" value="'+potongan_id+'">');
        ui.draggable.css('width','100%');        
      },
      hoverClass:'drop-potongan-biaya-hover',
    });

    $('.nominal').priceFormat({
      prefix: 'Rp ',
      centsSeparator:',',
      centsLimit:0,
      thousandsSeparator: '.'
       });
   });
 </script>
@endsection

@extends('layouts.backend.main')
@section('header')
  <link rel="stylesheet" href="{!!url('assets')!!}/dist/css/autocomplete.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
@endsection
@section('title')
  Profil Saya
@stop

@section('content')
  <section class="content-header">
    <h1>Profil Saya</h1>
  </section>
  	@if($user->role->id == 5)
	  @if($user->mahasiswa->status_mahasiswa_id == 1)
	    <div class="pad margin no-print">
	      <div class="callout callout-warning" style="margin-bottom: 0!important;">
	        <h4><i class="fa fa-warning"></i> Catatan:</h4>
	        Untuk melangkah ke tahap selanjutnya silahkan membayar biaya awal, lalu konfirmasi pembayaran pada form yang telah disediakan.
	      </div>
	    </div>
	  @endif
	@endif

  <section class="content"> 
    <div class="row">
	@if($user->role->id == 5)
		<div class="col-md-3">
			@include('users._biomahasiswa')
		</div>
	@else
		<div class="col-md-3">
			Profil
		</div>
	@endif

	@if($user->role->id == 5)
	      <div class="col-md-9">
	        @if($user->mahasiswa->status_mahasiswa_id == 2)
	          @include('users._menumahasiswaaktif')
	        @endif
	      </div>
	    </div>
	@else
		<div class="col-md-9">
	        Profil
	      </div>
	    </div>
	@endif
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

    $('#uploadedDokumen > li').on('click',function(){
      var title = $(this).attr('id');
      $('#UploadDokumenTitle').text('Upload '+title);

      $('#formUploadDokumen input[name="label"]').val(title);
    });
   });


 </script>
@endsection

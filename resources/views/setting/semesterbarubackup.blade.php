@extends('layouts.backend.main')
@section('header')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
@endsection
@section('title')
  Setup Semester Barus
@stop

@section('content')
  <section class="content-header">
    <h1>Setup Semester Baru</h1>
    
  </section>
  

  <section class="content"> 
    <div class="row">
    	<div class="col-md-12">
    		{!!Form::open(['route' => 'setup.semesterbaru','class' => 'form-horizontal'])!!}
    			<div class="f1-steps">
	    			<div class="f1-progress">
	    			    <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 12%;"></div>
	    			</div>
	    			<div class="f1-step active">
	    				<div class="f1-step-icon"><i class="fa fa-calendar"></i></div>
	    				<p>Tahun Akademik</p>
	    			</div>
	    			<div class="f1-step">
	    				<div class="f1-step-icon"><i class="fa fa-money"></i></div>
	    				<p>Biaya</p>
	    			</div>
	    		    <div class="f1-step">
	    				<div class="f1-step-icon"><i class="fa fa-twitter"></i></div>
	    				<p>Potongan</p>
	    			</div>

	    			<div class="f1-step">
	    				<div class="f1-step-icon"><i class="fa fa-twitter"></i></div>
	    				<p>social</p>
	    			</div>
	    		</div>
				<hr>
				
				<div class="box-step" id="step-1">

					<div class='form-group'>
						{!!Form::label('tahun_akademik_id','Tahun Akademik',['class' => 'col-sm-2 control-label'])!!}
						<div class="col-sm-10" id="tahunAkademikId">
							<div class="input-group">
								{!!Form::select('tahun_akademik_id',$tahunakademik,TASekarang()->id,['class' => 'form-control','required' => 'true'])!!}
								<div class="input-group-addon">
			                      <a  data-toggle="modal" href="#tambahTahunAkademik"><i class="fa fa-plus"></i></a>
			                    </div>
			                </div>
						</div>
						<div class="col-sm-offset-2 col-sm-10"><span class="text-muted">Adalah Tahun Akademik yang akan diaktifkan</span></div>
					</div>

			    	<div class='form-group'>	    		
						{!!Form::label('semester_aktif','Semester',['class' => 'col-sm-2 control-label'])!!}
						<div class="col-sm-10">
			    			{!!Form::input('number','semester_aktif',old('semester_aktif'),['class' => 'form-control','placeholder' => 'Semester','required' => 'true','max'=>'2'])!!}	    			  
			    		</div>
			    		<div class="col-sm-offset-2 col-sm-10"><span class="text-muted">Isi dengan angka 1 untuk ganjil dan 2 untuk Genap</span></div>
			    	</div>

			    	<hr>
			    	<a class="btn btn-sm btn-info pull-right" id="btn-lanjut-1">Lanjutkan</a>
	    		</div>

	    		<div style="display:none;" class="box-step" id="step-2">
		    		<div class="box box-widget">
			    		<div class="box-body">
		    				<p class="lead" id="pertanyaanBiaya">
		    					Apakah komponen biaya masih sama dengan tahun akademik sebelumnya ?
								<a class="btn btn-sm btn-success" id="biayaYa">Ya</a>
								<a class="btn btn-sm btn-warning" id="biayaTidak">Tidak</a>			
		    				</p>							
							
		    				
							<ul class="list-group list-group-unbordered">
							@foreach($biaya as $b)
								<li class="list-group-item" namaBiaya="{{$b->nama}}" jenisBiayaId="{{$b->jenisbiaya->id}}">
									<b>{{$b->nama}}</b> <a style="width:120px" class="pull-right nominal">{{$b->nominal}}</a>
								</li>							
		    				@endforeach
							</ul>
		    			</div>
					</div>
	    			<hr>
	    			<a class="btn btn-sm btn-warning" id="btn-sebelumnya-2">Sebelumnya</a>
			    	
	    		</div>

	    		<div style="display:none;" class="box-step" id="step-3">
		    		<div class="box box-widget">
			    		<div class="box-body">
		    				Potongan
		    			</div>
					</div>
	    			<hr>
	    			<a class="btn btn-sm btn-warning" id="btn-sebelumnya-3">Sebelumnya</a>
			    	
	    		</div>
    		{!!Form::close()!!}
    	</div>
    </div>
    
  </section>
  <p class="text-red" id="errorText"></p>

  
  <div class="modal fade" id="tambahTahunAkademik">
  	<div class="modal-dialog">
  		<div class="modal-content">
  			<div class="modal-header">
  				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  				<h4 class="modal-title">Tambah Tahun Akademik</h4>
  			</div>
  			<div class="modal-body form-horizontal">
  				<div class='form-group{{$errors->has('nama') ? ' has-error' : ''}}'>
  					{!!Form::label('nama_tahun_akademik','Nama',['class' => 'col-sm-2 control-label'])!!}
  					<div class="col-sm-10">
  					  {!!Form::text('nama_tahun_akademik',old('nama_tahun_akademik'),['class' => 'form-control','placeholder' => 'Nama','required' => 'true'])!!}  					  
  					</div>
  				</div>

  				<div class='form-group{{$errors->has('tanggal_mulai') ? ' has-error' : ''}}'>
  					{!!Form::label('tanggal_mulai','Tanggal Dimulai',['class' => 'col-sm-2 control-label'])!!}
  					<div class="col-sm-10">
  					  {!!Form::text('tanggal_mulai',old('tanggal_mulai'),['class' => 'form-control tanggal','placeholder' => 'Tanggal Mulai','required' => 'true'])!!}  					  
  					</div>
  				</div>

  				<div class='form-group{{$errors->has('tanggal_selesai') ? ' has-error' : ''}}'>
  					{!!Form::label('tanggal_akhir','Tanggal berakhir',['class' => 'col-sm-2 control-label'])!!}
  					<div class="col-sm-10">
  					  {!!Form::text('tanggal_akhir',old('tanggal_akhir'),['class' => 'form-control tanggal','placeholder' => 'Tanggal Selesai','required' => 'true'])!!}
  					  @if($errors->has('tanggal_selesai'))
  					    <span class="help-block">{{$errors->first('tanggal_selesai')}}</span>
  					  @endif
  					</div>
  				</div>
  			</div>
  			<div class="modal-footer">
  				
  				<button type="button" id="simpanTahunAkademik" class="btn btn-primary">Simpan</button>
  			</div>
  		</div>
  	</div>
  </div>
@stop

@section('footer')
<script src="{{url('assets/plugins/jquery-priceformat/jquery-priceformat.min.js')}}"></script>
	<script>
		$(document).ready(function(){
			$('body').on('click','#btn-lanjut-1',function(){
				if(!$('input[name="tahun_akademik_id"]').val() && !$('input[name="semester_aktif"]').val()){
					$('#errorText').text('Semua Field Wajib Diisi');					
				} else{	
					$('#step-1').slideUp(function(){
						$('div.f1-step:eq(0)').removeClass('active');
						$('div.f1-step:eq(0)').addClass('activated');
						$('div.f1-step:eq(1)').addClass('active');
						$('#step-2').slideDown();
						$('.f1-progress-line').css('width','37%');
						$('#errorText').text('');	
					});
				}
			});

			$('body').on('click','#btn-sebelumnya-2',function(){
								
					$('#step-2').slideUp(function(){
						$('div.f1-step:eq(0)').addClass('active');
						$('div.f1-step:eq(0)').removeClass('activated');
						$('div.f1-step:eq(1)').removeClass('active');
						$('#step-1').slideDown();
						$('.f1-progress-line').css('width','16.66%');
					});				
				
			});

			$('body').on('click','#btn-sebelumnya-3',function(){
								
					$('#step-3').slideUp(function(){
						$('div.f1-step:eq(1)').addClass('active');
						$('div.f1-step:eq(1)').removeClass('activated');
						$('div.f1-step:eq(2)').removeClass('active');
						$('#step-2').slideDown();
						$('.f1-progress-line').css('width','37%');
					});				
				
			});

			$('.tanggal').datepicker({
				dateFormat : 'yy-mm-dd',
				changeYear: true,
				changeMonth: true,
			});

			$('#simpanTahunAkademik').click(function(){
				var _token = '{{Session::token()}}';
				var nama = $('input[name="nama_tahun_akademik"]').val();
				var tanggal_mulai = $('input[name="tanggal_mulai"]').val();
				var tanggal_akhir = $('input[name="tanggal_akhir"]').val();
				$.ajax({
				    method:'POST',
				    url:'{{route('tahunakademik.ajax.insert')}}',
				    data:{_token:_token,nama:nama,tanggal_mulai:tanggal_mulai,tanggal_akhir:tanggal_akhir}
				    }).success(function(data){
				    	console.log(data['select']);

				      $('#tahunAkademikId').html(data['select']);
				      $('#tambahTahunAkademik').modal('toggle');
				  });				
			});

			$('body').on('click','#biayaYa',function(){
				var html = 'Biaya telah disetting sama dengan tahun akademik sebelumnya.\
							<input type="hidden" name="biaya_sama" value="1">';
				$('#pertanyaanBiaya').html(html);
				$('#pertanyaanBiaya').addClass('text-green');
				$('#step-2').append('<a class="btn btn-sm btn-info pull-right" id="btn-lanjut-2">Lanjutkan</a>')
			});

			$('body').on('click','#biayaTidak',function(){
				var html = 'Silahkan masukkan nominal untuk tiap jenis biaya';
				$('#pertanyaanBiaya').html(html);
				$('#pertanyaanBiaya').addClass('text-green');
				$('li.list-group-item a').remove();
				//console.log($('li.list-group-item'));
				$('li.list-group-item').each(function(){
					var namaBiaya = $(this).attr('namaBiaya');
					var jenisBiayaId = $(this).attr('jenisBiayaId');
					$(this).append('<input style="width:130px" class="pull-right inputBiaya" name="biaya['+jenisBiayaId+']">');		
				});

				$('#step-2').append('<a class="btn btn-sm btn-info pull-right" id="btn-lanjut-2">Lanjutkan</a>')
			});

			$('body').on('click','#btn-lanjut-2',function(){
				$('#errorText').text('');
				if($('input.inputBiaya').length){
					$('input.inputBiaya').each(function(){
						if(!$(this).val()){
							$('#errorText').text('Semua field Wajib Diisi');
						}
					});

					if($('#errorText:contains("Semua field Wajib Diisi")').length <= 0){
						$('#step-2').slideUp(function(){
						$('div.f1-step:eq(1)').removeClass('active');
						$('div.f1-step:eq(1)').addClass('activated');
						$('div.f1-step:eq(2)').addClass('active');
						$('#step-3').slideDown();
						$('.f1-progress-line').css('width','65%');
						$('#errorText').text('');	
					});
					}					
				} else{	
					$('#step-2').slideUp(function(){
						$('div.f1-step:eq(1)').removeClass('active');
						$('div.f1-step:eq(1)').addClass('activated');
						$('div.f1-step:eq(2)').addClass('active');
						$('#step-3').slideDown();
						$('.f1-progress-line').css('width','65%');
						$('#errorText').text('');	
					});
				}

			});

			$('body').on('click','#btn-lanjut-4',function(){
				// console.log($('input[name="biaya[]"]'));
				var _token = '{{Session::token()}}';
				var biaya = [];
				var data = {};
				// alert(biaya);
				$('input.inputBiaya').each(function(i){
					data[i] = {nama:$(this).parent().attr('namaBiaya'),jenis_biaya_id:$(this).parent().attr('jenisBiayaId'),nominal:$(this).val(),tahun_akademik_id:1};
					biaya.push = data;					
				});

				$.ajax({
					    method:'POST',
					    url:'{{route('post.setup.semester')}}',
					    data:{data:data,_token:_token}
					    }).success(function(res){
					      console.log(res);
				});
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


@extends('layouts.backend.main')
@section('header')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
@endsection
@section('title')
  Setup Semester Barus
@stop

@section('content')
  <section class="content-header">
    <h1>Setup Tahun Akademik Baru</h1>
    
  </section>
  

  <section class="content"> 
    <div class="row">
    	<div class="col-md-8">    		
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
					<div class="box box-primary">					
						<div class="box-body">
							<div class="col-md-6">
								<strong><i class="fa fa-book margin-r-5"></i> Tahun Akademik Aktif Sekarang</strong>
								<p class="text-muted">{{TASekarang()->nama}}</p>
							</div>
							<div class="col-md-6">								
								<button class="btn btn-warning" data-toggle="modal" href='#tambahtahunAkademik'>Buat baru <i class="fa fa-plus"></i></button>
							</div>
							
						</div>						
					</div>
					
					
			    	<a class="btn btn-sm btn-info pull-right" style="display:none;" id="btn-lanjut-1">Lanjutkan</a>
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
		    				<p class="lead" id="pertanyaanPotongan">
		    					Apakah Potongan biaya masih sama dengan tahun akademik sebelumnya ?
								<a class="btn btn-sm btn-success" id="potonganYa">Ya</a>
								<a class="btn btn-sm btn-warning" id="potonganTidak">Tidak</a>			
		    				</p>
		    			</div>
					</div>
	    			<hr>
	    			<a class="btn btn-sm btn-warning" id="btn-sebelumnya-3">Sebelumnya</a>
			    	
	    		</div>

	    		<div style="display:none;" class="box-step" id="step-4" style="display:none;">
		    		<div class="box box-widget">
			    		<div class="box-body">
		    				<p class="lead pull-left">Apakah Anda yakin ? </p>
			    			{!!Form::open(['route' => 'post.setup.tahunakademik','class' => 'class'])!!}
			    			<input type="submit" class="btn btn-primary pull-right" value="Proses">
			    			{!!Form::close()!!}
		    			</div>
					</div>
	    			<hr>
	    			<a class="btn btn-sm btn-warning" id="btn-sebelumnya-3">Sebelumnya</a>
			    	
	    		</div>
    		
    	</div>

    	<div class="col-md-4">
    		<div id="result" class="list-group">
    			<div id="hasilTahunAkademik"></div>				
				<div id="hasilBiaya"></div>
				<div id="hasilPotongan"></div>
			</div>
    	</div>
    </div>
    
  </section>
  <p class="text-red" id="errorText"></p>
	
	
	<div class="modal fade" id="tambahtahunAkademik">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Pilih Tahun Akademik yang akan dibuka</h4>
				</div>
				<div class="modal-body form-horizontal">
					<div class='form-group{{$errors->has('tahun_akademik_id') ? ' has-error' : ''}}'>
						{!!Form::label('tahun_akademik_id','Tahun Akademik',['class' => 'col-sm-2 control-label'])!!}
						<div class="col-sm-10">
						  {!!Form::select('tahun_akademik_id',$tahunakademik,TASekarang()->id,['class' => 'form-control','required' => 'true'])!!}						  
						</div>
					</div>									
				</div>
				<div class="modal-footer">							
					<button id="simpanTahunAkademikBaru" type="button" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</div>
	</div>

	
	<div class="modal fade" id="tambahPotonganBiaya">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Tambah Potongan Biaya</h4>
				</div>
				<div class="modal-body form-horizontal">
					<div class='form-group'>
						{!!Form::label('nama_potongan','Nama',['class' => 'col-sm-2 control-label'])!!}
						<div class="col-sm-10">
						  {!!Form::text('nama_potongan',old('nama_potongan'),['class' => 'form-control','placeholder' => 'Nama','required' => 'true'])!!}						 
						</div>
					</div>

					<div class='form-group'>
						{!!Form::label('besaran','Besaran Potongan',['class' => 'col-sm-2 control-label'])!!}
						<div class="col-sm-10">
						  {!!Form::text('besaran',old('besaran'),['class' => 'form-control','placeholder' => 'Besaran Potongan','required' => 'true'])!!}						  
						</div>
					</div>

					<div class='form-group'>
						{!!Form::label('deskripsi','Deskripsi',['class' => 'col-sm-2 control-label'])!!}
						<div class="col-sm-10">
						  {!!Form::textarea('deskripsi',old('deskripsi'),['class' => 'form-control','placeholder' => 'Deskripsi'])!!}						  
						</div>
					</div>

					<div class="form-group">
						{!!Form::label('biaya_id','Untuk Biaya',['class' => 'col-sm-2 control-label'])!!}
						<div class="col-sm-10">
							<select class="form-control" name="biaya_id" id="pilihanBiayaIdPotongan">
								
							</select>
						</div>
					</div>


					
				</div>
				<div class="modal-footer">					
					<button type="button" id="simpanPotonganBaru" class="btn btn-primary">Simpan</button>
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
					
				$('#step-1').slideUp(function(){
					$('div.f1-step:eq(0)').removeClass('active');
					$('div.f1-step:eq(0)').addClass('activated');
					$('div.f1-step:eq(1)').addClass('active');
					$('#step-2').slideDown();
					$('.f1-progress-line').css('width','37%');
					$('#errorText').text('');	
				});
				
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

			$('body').on('click','#btn-lanjut-3',function(){
				
				$('#step-3').slideUp(function(){
						$('div.f1-step:eq(2)').removeClass('active');
						$('div.f1-step:eq(2)').addClass('activated');
						$('div.f1-step:eq(3)').addClass('active');
						$('#step-4').slideDown();
						$('.f1-progress-line').css('width','85%');
						$('#errorText').text('');	
				});
			});

			$('.nominal').priceFormat({
		      prefix: 'Rp ',
		      centsSeparator:',',
		      centsLimit:0,
		      thousandsSeparator: '.'
		    });

		    //Baru ///////////////////////////////////////////////////////////////
		    

		    $('input[name="tanggal_mulai"]').datepicker({
                dateFormat : 'yy-mm-dd',
                yearRange: "-70:+0",
                changeYear: true,
                changeMonth: true,                
              });
		    $('input[name="tanggal_akhir"]').datepicker({
                dateFormat : 'yy-mm-dd',
                yearRange: "-70:+0",
                changeYear: true,
                changeMonth: true,                
              });

		    $('#simpanTahunAkademikBaru').click(function(){
		    	var tahun_akademik_id = $('select[name="tahun_akademik_id"]').val();		    	
		    	var _token = '{{Session::token()}}';

		    	$.ajax({
		    	    method:'POST',
		    	    url:'{{route('session.tambah.tahunakademik.baru')}}',
		    	    data:{tahun_akademik_id:tahun_akademik_id,_token:_token}
		    	    }).success(function(data){

		    	      $('#hasilTahunAkademik').html(data['html']);
		    	      $('#tambahtahunAkademik').modal('toggle');	
		    	      $('#btn-lanjut-1').show();	    	      
		    	  });

		    });	   

		    $('body').on('click','#biayaYa',function(){
				var html = 'Biaya telah disetting sama dengan tahun akademik sebelumnya.\
							<input type="hidden" name="biaya_sama" value="1">';
				var _token = '{{Session::token()}}';				
				$.ajax({
				    method:'POST',
				    url:'{{route('session.biaya.sama')}}',
				    data:{_token:_token}
				    }).success(function(data){
						$('#hasilBiaya').html(data['html']);
						$('#pertanyaanBiaya').html(html);
						$('#pertanyaanBiaya').addClass('text-green');
						$('#step-2').append('<a class="btn btn-sm btn-info pull-right" id="btn-lanjut-2">Lanjutkan</a>')
				  });
				
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

				$('#pertanyaanBiaya').parent().append('<button id="simpanBiaya" class="btn btn-success pull-right">Simpan</button>');

				
			});

			$('body').on('click','#simpanBiaya',function(){
				$('#step-2').append('<a class="btn btn-sm btn-info pull-right" id="btn-lanjut-2">Lanjutkan</a>');
				var _token = '{{Session::token()}}';
				var idTerakhirBiaya = {{$idTerakhirBiaya}}
				var tahun_akademik_id = {{$idTerakhirTahunAkademik + 1}};
				var biaya = [];
				$('li.list-group-item').each(function(i){	
					var id = idTerakhirBiaya + i + 1;				
					var namaBiaya = $(this).attr('namaBiaya');
					var jenisBiayaId = $(this).attr('jenisBiayaId');
					var nominal = $(this).find('input').val();
					var data = {id:id,nama:namaBiaya,jenis_biaya_id:jenisBiayaId,nominal:nominal,tahun_akademik_id:tahun_akademik_id}
					biaya[i] = data;
					
				});

				$.ajax({
				    method:'POST',
				    url:'{{route('session.biaya.baru')}}',
				    data:{_token:_token,biaya:biaya}
				    }).success(function(data){
				    	$('#hasilBiaya').html('<div class="list-group-item"><h4>Biaya</h4></div>');

						data['biaya'].forEach(function(item,index){
							//console.log(item.nama);
							$('#hasilBiaya > .list-group-item').append('<p class="list-group-item-text">'+item.nama+'<span class="nominalBiaya pull-right">'+item.nominal+'</span></p>');

						});

						$('.nominalBiaya').priceFormat({
						      prefix: 'Rp ',
						      centsSeparator:',',
						      centsLimit:0,
						      thousandsSeparator: '.'
						});
						$('#pertanyaanBiaya').html('Biaya Berhasil Di tambahkan');
						$('#simpanBiaya').prev().slideUp().remove();
						$('#simpanBiaya').remove();
				  });

			});

			$('body').on('click','#potonganYa',function(){
				var html = 'Potongan telah disetting sama dengan tahun akademik sebelumnya.';
				var _token = '{{Session::token()}}';				
				$.ajax({
				    method:'POST',
				    url:'{{route('session.potongan.sama')}}',
				    data:{_token:_token}
				    }).success(function(data){
						$('#hasilPotongan').html(data['html']);
						$('#pertanyaanPotongan').html(html);
						$('#pertanyaanPotongan').addClass('text-green');
						$('#step-3').append('<a class="btn btn-sm btn-info pull-right" id="btn-lanjut-3">Lanjutkan</a>')
				  });
				
			});

			$('body').on('click','#potonganTidak',function(){
				var html = 'Klik tombol tambah untuk tambah data potongan baru';			

				$('#pertanyaanPotongan').html(html);
				$('#pertanyaanPotongan').parent().append('<a class="btn btn-primary" id="btnTambahPotonganBiaya" data-toggle="modal" href="#tambahPotonganBiaya"><i class="fa fa-plus"></i> Tambah Potongan</a>')
				$('#step-3').append('<a class="btn btn-sm btn-info pull-right" id="btn-lanjut-3">Lanjutkan</a>')

			});

			$('body').on('click','#btnTambahPotonganBiaya',function(){
				var _token = '{{Session::token()}}';				
				$.ajax({
				    method:'POST',
				    url:'{{route('session.ambil.biaya')}}',
				    data:{_token:_token}
				    }).success(function(data){
				      $('#pilihanBiayaIdPotongan').html(data['html']);
				  });
			});

			$('body').on('click','#simpanPotonganBaru',function(){
				var _token = '{{Session::token()}}';				
				var nama_potongan = $('input[name="nama_potongan"]').val();
				var besaran = $('input[name="besaran"]').val();
				var deskripsi = $('textarea[name="deskripsi"]').val();
				var biaya_id = $('select[name="biaya_id"]').val();
				var nama_biaya = $('select[name="biaya_id"] :selected').text();


				$.ajax({
				    method:'POST',
				    url:'{{route('session.tambah.potongan.baru')}}',
				    data:{_token:_token,nama_potongan:nama_potongan,besaran:besaran,deskripsi:deskripsi,biaya_id:biaya_id,nama_biaya:nama_biaya}
				    }).success(function(data){
				      $('#tambahPotonganBiaya').modal('toggle');
				      $('#tambahPotonganBiaya').find("input[type=text], textarea").val("");

				      $('#hasilPotongan').html('<div class="list-group-item"><h4>Potongan</h4></div>');

				      data['potongan'].forEach(function(item,index){
				      	$('#hasilPotongan > .list-group-item').append('<p class="list-group-item-text">'+item.nama_potongan+'<span class="nominalBiaya pull-right">'+item.nama_biaya+'</span></p>');
				      });
				  });
			});
		});	
	</script>
@endsection

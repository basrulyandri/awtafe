@extends('layouts.frontend.main')
@section('header')
	<link rel="stylesheet" href="{!!url('assets')!!}/dist/css/autocomplete.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
@endsection

@section('content')
<section id="team" class="section greensea-bg">
    <div class="container">
      
      <div class="row">
        
        
        <div class="col-md-12">
          <div class="page-title text-center">  
                <div class="container">
			<div class="row text-center title">
				<h2>DOWNLOAD BROSUR</h2>
				<h4>Isi Formulir di bawah ini, dan dapatkan Brosur STAI Binamadani. </h4>
				<h4>Dan dapatkan update program terbaru STAI Binamadani seperti, Beasiswa, Kegiatan dll. </h4>
			</div>
			<div class="row services">
				{!!Form::open(['class' => 'page-form','route' => 'page.postdownloadbrosur'])!!}
				
					{!!Form::text('nama',old('nama'),['class' => 'form-control','placeholder' => 'Nama Lengkap'])!!}					
				
					@if($errors->has('nama'))
						<span class="error-block">{{$errors->first('nama')}}</span>
					@endif

					{!!Form::email('email',old('email'),['class' => 'form-control ','placeholder' => 'Email'])!!}
					@if($errors->has('email'))
						<span class="error-block">{{$errors->first('email')}}</span>
					@endif
					
					{!!Form::select('jenis_kelamin',['' => 'Pilih Jenis Kelamin','P'=>'Pria','W'=>'wanita'],old('jenis_kelamin'),['class' => 'form-control form-select'])!!}
					<!-- <select name="jenis_kelamin" class="form-control form-select">
						<option value="">Pilih Jenis kelamin</option>
						<option value="P">Pria</option>
						<option value="W">Wanita</option>
					</select> -->
					@if($errors->has('jenis_kelamin'))
						<span class="error-block">{{$errors->first('jenis_kelamin')}}</span>
					@endif					

					{!!Form::text('telepon',old('telepon'),['class' => 'form-control ','placeholder' => 'Telepon (contoh : 0812xxxxxxxx)'])!!}
					@if($errors->has('telepon'))
						<span class="error-block">{{$errors->first('telepon')}}</span>
					@endif
					
					{!!Form::select('konsentrasi_id',$konsentrasi,old('konsentrasi_id'),['class' => 'form-control  form-select'])!!}						
					@if($errors->has('konsentrasi_id'))
						<span class="error-block">{{$errors->first('konsentrasi_id')}}</span>
					@endif

					{!!Form::select('kelas_id',$kelas,old('kelas_id'),['class' => 'form-control form-select dropdown'])!!}
					@if($errors->has('kelas_id'))
					<span class="error-block">{{$errors->first('kelas_id')}}</span>
					@endif			

					
					{!! Recaptcha::render() !!}
					@if($errors->has('g-recaptcha-response'))
						<span class="error-block">{{$errors->first('g-recaptcha-response')}}</span>
					@endif
					<button type="submit" class="btn btn-submit">Klik Untuk Download</button>
				{!!Form::close()!!}				
			</div>
		</div>    
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
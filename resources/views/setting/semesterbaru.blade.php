@extends('layouts.backend.main')
@section('header')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
@endsection
@section('title')
  Setup Semester Baru
@stop

@section('content')
  <section class="content-header">
    <h1>Setup Semester Baru</h1>
    
  </section>
  

  <section class="content"> 
    <div class="row">
    <div class="col-md-12">

    	<div class="box box-widget widget-user-2">
    		<div class="box-body">
    			<h5 class="lead">Setup semester baru ini akan mengubah dari semester Ganjil menjadi semester Genap, yang secara otomatis akan berdampak pada :</h5>
    		</div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">1. Perubahan status semester pada seluruh mahasiswa <span class="pull-right badge bg-blue">31</span></a></li>
                <li><a href="#">2. Penambahan tagihan biaya <b>Registrasi Ulang</b> dan <b>Biaya Kuliah</b> pada mahasiswa<span class="pull-right badge bg-blue">31</span></a></li>
              </ul>
            </div>
        </div>
    	{!!Form::open(['route' => 'post.setup.semesterbaru','class' => 'form-horizontal'])!!}
    		<input type="submit" class="btn btn-primary" value="LANJUTKAN">
    	{!!Form::close()!!}
    </div>
    </div>
    
  </section>
 
@stop

@section('footer')

@endsection

@extends('layouts.backend.main')
@section('header')
  
@endsection
@section('title')
  Fatwa
@stop

@section('content')
  <section class="content-header">
    <h1>Kumpulan Fatwa</h1>    
  </section>
  

  <section class="content"> 
    <div class="row">
    	@foreach($fatwas as $fatwa)    	
		<div class="col-md-6 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><a style="color: #FFF" target="_blank" href="{{url('assets/uploads/files/fatwa')}}/{{$fatwa->filename}}"><i class="fa fa-file-pdf-o"></i></a></span>

            <div class="info-box-content">
              <span class="info-box-number"><a  style="color: #000" target="_blank" href="{{url('assets/uploads/files/fatwa')}}/{{$fatwa->filename}}">{{$fatwa->title}}</a></span>
              <span class="text-muted"><i class="fa fa-barcode"></i> {{$fatwa->code}}</span><br>
              <span class="text-muted"><i class="fa fa-calendar"></i> {{$fatwa->date}} Kategori: <strong>{{$fatwa->category->name}}</strong></span>
            </div>
            <div class="info-box-description" style="clear: both;padding: 5px; max-height: 68px;overflow: hidden">
            	<span class="text-muted">{{$fatwa->description,100}}</span>
            </div>
            <!-- /.info-box-content-->
          </div>
          <!-- /.info-box -->
        </div>   
        @endforeach
    </div>
    </div>
  </section>
@stop

@section('footer')

@endsection

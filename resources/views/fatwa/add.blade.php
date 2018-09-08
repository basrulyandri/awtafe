@extends('layouts.backend.main')
@section('header')
  <link rel="stylesheet" href="{!!url('assets')!!}/dist/css/autocomplete.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
@endsection
@section('title')
  Tambah Fatwa
@stop

@section('content')

  <section class="content-header">
    <h1>Tambah Fatwa</h1>    
  </section>
  

  <section class="content"> 
    <div class="row">
    	<div class="col-md-8">
    		{!!Form::open(['route' => 'fatwa.insert','class' => 'form-horizontal','enctype' => 'multipart/form-data'])!!}
    			<div class='form-group{{$errors->has('code') ? ' has-error' : ''}}'>
    				{!!Form::label('code','No. Fatwa',['class' => 'col-sm-2 control-label'])!!}
    				<div class="col-sm-10">
    				  {!!Form::text('code',old('code'),['class' => 'form-control','placeholder' => 'No. Fatwa','required' => 'true'])!!}
    				  @if($errors->has('code'))
    				    <span class="help-block">{{$errors->first('code')}}</span>
    				  @endif
    				</div>
    			</div>

    			

    			<input type="hidden" name="type_id" value="1">
    			<div class='form-group{{$errors->has('title') ? ' has-error' : ''}}'>
    				{!!Form::label('title','Judul',['class' => 'col-sm-2 control-label'])!!}
    				<div class="col-sm-10">
    				  {!!Form::text('title',old('title'),['class' => 'form-control','placeholder' => 'Judul','required' => 'true'])!!}
    				  @if($errors->has('title'))
    				    <span class="help-block">{{$errors->first('title')}}</span>
    				  @endif
    				</div>
    			</div>
    			
    			<input type="hidden" name="user_id" value="{{\Auth::user()->id}}">
    			
    			<div class='form-group{{$errors->has('description') ? ' has-error' : ''}}'>
					{!!Form::label('description','Deskripsi',['class' => 'col-sm-2 control-label'])!!}
					<div class="col-sm-10">
					  {!!Form::textarea('description',old('description'),['class' => 'form-control','placeholder' => 'Deskripsi'])!!}
					  @if($errors->has('description'))
					    <span class="help-block">{{$errors->first('description')}}</span>
					  @endif
					</div>
				</div>

				<div class='form-group{{$errors->has('content') ? ' has-error' : ''}}'>
					{!!Form::label('content','Konten',['class' => 'col-sm-2 control-label'])!!}
					<div class="col-sm-10">
					  {!!Form::textarea('content',old('content'),['class' => 'form-control','placeholder' => 'Konten','id' => 'content'])!!}
					  @if($errors->has('content'))
					    <span class="help-block">{{$errors->first('content')}}</span>
					  @endif
					</div>
				</div>
    		
    	</div>
    	<div class="col-md-4" role="form">
    		<div class='form-group{{$errors->has('date') ? ' has-error' : ''}}'>
				{!!Form::label('date','Tanggal Terbit',[])!!}
				
				  {!!Form::text('date',old('date'),['class' => 'form-control','placeholder' => 'Tanggal Terbit','required' => 'true','id'=>'tanggalterbit'])!!}
				  @if($errors->has('date'))
				    <span class="help-block">{{$errors->first('date')}}</span>
				  @endif
				
			</div>
			<div class='form-group{{$errors->has('category_id') ? ' has-error' : ''}}'>
				{!!Form::label('category_id','Kategori',[])!!}				
				  {!!Form::select('category_id',$categories,old('category_id'),['class' => 'form-control','required' => 'true'])!!}
				  @if($errors->has('category_id'))
				    <span class="help-block">{{$errors->first('category_id')}}</span>
				  @endif				
			</div>

			<div class='form-group{{$errors->has('filename') ? ' has-error' : ''}}'>
				{!!Form::label('filename','File',[])!!}				
				  {!!Form::file('filename',['class' => 'form-control','placeholder' => 'File'])!!}
				  @if($errors->has('filename'))
				    <span class="help-block">{{$errors->first('filename')}}</span>
				  @endif				
			</div>

			<input type="submit" class="btn btn-info pull-right" value="Simpan">
			{!!Form::close()!!}
    	</div>
    </div>
  </section>
@stop

@section('footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.6.1/ckeditor.js"></script>
	<script>
		$(document).ready(function(){
			$('#tanggalterbit').datepicker({
		        dateFormat : 'yy-mm-dd',
		        yearRange: "-70:+0",
		        changeYear: true,
		        changeMonth: true,	        
	    	});
	    	CKEDITOR.replace('content');
		});
	</script>
@endsection

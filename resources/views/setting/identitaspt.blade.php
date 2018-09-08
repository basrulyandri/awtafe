@extends('layouts.backend.main')

@section('title')
  Ubah Identitas Perguruan Tinggi
@stop
@section('content')
<section class="content-header">
  <h1>
    Ubah Identitas
  </h1>
</section>

<section class="content">
  <div class='row'>
    <div class='col-md-12'>
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Detail Identitas Perguruan Tinggi</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
       {!!Form::open(['route' => 'setting.identitasptupdate','class' => 'form-horizontal', 'enctype' => 'multipart/form-data'])!!}

       <div class="box-body">
         <div class='form-group{{$errors->has('kode') ? ' has-error' : ''}}'>
           {!!Form::label('kode','Kode DIKTI',['class' => 'col-sm-2 control-label'])!!}
           <div class="col-sm-10">
             {!!Form::text('kode',$identitas->kode,['class' => 'form-control','placeholder' => 'Kode DIKTI'])!!}
             @if($errors->has('kode'))
               <span class="help-block">{{$errors->first('kode')}}</span>
             @endif
           </div>
         </div>

         <div class='form-group{{$errors->has('kode_hukum') ? ' has-error' : ''}}'>
           {!!Form::label('kode_hukum','Kode Hukum',['class' => 'col-sm-2 control-label'])!!}
           <div class="col-sm-10">
             {!!Form::text('kode_hukum',$identitas->kode_hukum,['class' => 'form-control','placeholder' => 'Kode Hukum'])!!}
             @if($errors->has('kode_hukum'))
               <span class="help-block">{{$errors->first('kode_hukum')}}</span>
             @endif
           </div>
         </div>

         <div class='form-group{{$errors->has('nama') ? ' has-error' : ''}}'>
           {!!Form::label('nama','Nama Perguruan Tinggi',['class' => 'col-sm-2 control-label'])!!}
           <div class="col-sm-10">
             {!!Form::text('nama',$identitas->nama,['class' => 'form-control','placeholder' => 'Nama Perguruan Tinggi'])!!}
             @if($errors->has('nama'))
               <span class="help-block">{{$errors->first('nama')}}</span>
             @endif
           </div>
         </div>
         <div class='form-group{{$errors->has('tgl_berdiri') ? ' has-error' : ''}}'>
           {!!Form::label('tgl_berdiri','Tanggal Berdiri',['class' => 'col-sm-2 control-label'])!!}
           <div class="col-sm-10">
             {!!Form::text('tgl_berdiri',$identitas->tgl_berdiri,['class' => 'form-control','placeholder' => 'Tanggal Berdiri'])!!}
             @if($errors->has('tgl_berdiri'))
               <span class="help-block">{{$errors->first('tgl_berdiri')}}</span>
             @endif
           </div>
         </div>

         <div class='form-group{{$errors->has('alamat') ? ' has-error' : ''}}'>
           {!!Form::label('alamat','Alamat Lengkap',['class' => 'col-sm-2 control-label'])!!}
           <div class="col-sm-10">
             {!!Form::textarea('alamat',$identitas->alamat,['class' => 'form-control','placeholder' => 'Alamat Lengkap'])!!}
             @if($errors->has('alamat'))
               <span class="help-block">{{$errors->first('alamat')}}</span>
             @endif
           </div>
         </div>

         <div class='form-group{{$errors->has('telepon') ? ' has-error' : ''}}'>
           {!!Form::label('telepon','Telepon',['class' => 'col-sm-2 control-label'])!!}
           <div class="col-sm-10">
             {!!Form::text('telepon',$identitas->telepon,['class' => 'form-control','placeholder' => 'Telepon'])!!}
             @if($errors->has('telepon'))
               <span class="help-block">{{$errors->first('telepon')}}</span>
             @endif
           </div>
         </div>

         <div class='form-group{{$errors->has('fax') ? ' has-error' : ''}}'>
           {!!Form::label('fax','Faximili',['class' => 'col-sm-2 control-label'])!!}
           <div class="col-sm-10">
             {!!Form::text('fax',$identitas->fax,['class' => 'form-control','placeholder' => 'Faximili'])!!}
             @if($errors->has('fax'))
               <span class="help-block">{{$errors->first('fax')}}</span>
             @endif
           </div>
         </div> 

         <div class='form-group{{$errors->has('email') ? ' has-error' : ''}}'>
           {!!Form::label('email','Email',['class' => 'col-sm-2 control-label'])!!}
           <div class="col-sm-10">
             {!!Form::text('email',$identitas->email,['class' => 'form-control','placeholder' => 'Email'])!!}
             @if($errors->has('email'))
               <span class="help-block">{{$errors->first('email')}}</span>
             @endif
           </div>
         </div>

         <div class='form-group{{$errors->has('website') ? ' has-error' : ''}}'>
           {!!Form::label('website','Website',['class' => 'col-sm-2 control-label'])!!}
           <div class="col-sm-10">
             {!!Form::text('website',$identitas->website,['class' => 'form-control','placeholder' => 'Website'])!!}
             @if($errors->has('website'))
               <span class="help-block">{{$errors->first('website')}}</span>
             @endif
           </div>
         </div>
  
          <div class='form-group{{$errors->has('no_akta') ? ' has-error' : ''}}'>
            {!!Form::label('no_akta','No. Akta',['class' => 'col-sm-2 control-label'])!!}
            <div class="col-sm-10">
              {!!Form::text('no_akta',$identitas->no_akta,['class' => 'form-control','placeholder' => 'No. Akta'])!!}
              @if($errors->has('no_akta'))
                <span class="help-block">{{$errors->first('no_akta')}}</span>
              @endif
            </div>
          </div>

          <div class='form-group{{$errors->has('tgl_akta') ? ' has-error' : ''}}'>
            {!!Form::label('tgl_akta','Tanggal Akta',['class' => 'col-sm-2 control-label'])!!}
            <div class="col-sm-10">
              {!!Form::text('tgl_akta',$identitas->tgl_akta,['class' => 'form-control','placeholder' => 'Tanggal Akta'])!!}
              @if($errors->has('tgl_akta'))
                <span class="help-block">{{$errors->first('tgl_akta')}}</span>
              @endif
            </div>
          </div>

          <div class='form-group{{$errors->has('logo') ? ' has-error' : ''}}'>
            {!!Form::label('logo','Logo',['class' => 'col-sm-2 control-label'])!!}
            <div class="col-sm-10">
              {!!Form::file('logo',['class' => 'form-control','placeholder' => 'Logo'])!!}
              @if($errors->has('logo'))
                <span class="help-block">{{$errors->first('logo')}}</span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
              @if($identitas->logo)
                <img class="img-responsive" src="{!!url('assets/uploads')!!}/{{$identitas->logo}}" alt="Photo">
              @endif
            </div>
          </div>
          <input type="submit" class="btn btn-primary pull-right" value="Save">
       </div>
       
       {!!Form::close()!!}
      </div>
    </div>
  </div>
</section>
@stop

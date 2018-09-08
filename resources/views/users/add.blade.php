@extends('layouts.backend.main')

@section('title')
  Add User
@stop
@section('content')
<section class="content-header">
  <h1>
    Add Users
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
        {!!Form::open(['route' =>'user.create', 'class' => 'form-horizontal','enctype' => 'multipart/form-data'])!!}
          <div class="box-body">
            <div class='form-group{{$errors->has('username') ? ' has-error' : ''}}'>
              {!!Form::label('username','Username',['class' => 'col-sm-2 control-label'])!!}
              <div class="col-sm-10">
                {!!Form::text('username',old('username'),['class' => 'form-control','placeholder' => 'Username'])!!}
                @if($errors->has('username'))
                  <span class="help-block">{{$errors->first('username')}}</span>
                @endif
              </div>
            </div>
            
            <div class='form-group{{$errors->has('email') ? ' has-error' : ''}}'>
              {!!Form::label('email','Email',['class' => 'col-sm-2 control-label'])!!}
              <div class="col-sm-10">
                {!!Form::email('email',old('email'),['class' => 'form-control','placeholder' => 'Email'])!!}
                @if($errors->has('email'))
                  <span class="help-block">{{$errors->first('email')}}</span>
                @endif
              </div>
            </div>

            <div class='form-group{{$errors->has('role_id') ? ' has-error' : ''}}'>
              {!!Form::label('role_id','Role',['class' => 'col-sm-2 control-label'])!!}
              <div class="col-sm-10">
                {!!Form::select('role_id',$roles,old('role_id'),['class' => 'form-control'])!!}
                @if($errors->has('role_id'))
                  <span class="help-block">{{$errors->first('role_id')}}</span>
                @endif
              </div>
            </div>

            <div class='form-group{{$errors->has('password') ? ' has-error' : ''}}'>
              {!!Form::label('password','Password',['class' => 'col-sm-2 control-label'])!!}
              <div class="col-sm-10">
                {!!Form::password('password',['class' => 'form-control','placeholder' => 'Password'])!!}
                @if($errors->has('password'))
                  <span class="help-block">{{$errors->first('password')}}</span>
                @endif
              </div>
            </div>

            <div class='form-group{{$errors->has('password_confirmation') ? ' has-error' : ''}}'>
              {!!Form::label('password_confirmation','Password Confirmation',['class' => 'col-sm-2 control-label'])!!}
              <div class="col-sm-10">
                {!!Form::password('password_confirmation',['class' => 'form-control','placeholder' => 'Password Confirmation'])!!}
                @if($errors->has('password_confirmation'))
                  <span class="help-block">{{$errors->first('password_confirmation')}}</span>
                @endif
              </div>
            </div>
            <div class='form-group{{$errors->has('photo') ? ' has-error' : ''}}'>
              {!!Form::label('photo','Photo',['class' => 'col-sm-2 control-label'])!!}
              <div class="col-sm-10">
                {!!Form::file('photo',['class' => 'form-control','placeholder' => 'Photo'])!!}
                @if($errors->has('photo'))
                  <span class="help-block">{{$errors->first('photo')}}</span>
                @endif
              </div>
            </div>

          </div><!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-info pull-right">Save</button>
          </div><!-- /.box-footer -->
        {!!Form::close()!!}
      </div>
    </div>
  </div>
</section>
@stop
